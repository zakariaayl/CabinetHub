<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    private function resolveTemplate(string $slug): array
    {
        $tpl = Config::get("document-templates.$slug");
        abort_unless($tpl, 404, 'Template introuvable');
        return $tpl;
    }
    public function index(){
        // Liste des catégories
        $categories = [
            'Contrats',
            'Recrutement / Offre',
            'Arrivée / Onboarding',
            'Attestations & Certificats',
            'Rupture / Fin de contrat',
            'Paie & RH administratifs',
            'Discipline & Légal',
            'Formation',
            'Santé & Sécurité',
            'Autres'
        ];

        // Mock des documents pour afficher dans la vue
        $documents = [
            [
                'nom' => 'Contrat CDI - Jean Dupont',
                'categorie' => 'Contrats',
                'date' => '12/08/2025'
            ],
            [
                'nom' => 'Offre Stage Marketing',
                'categorie' => 'Recrutement / Offre',
                'date' => '10/08/2025'
            ],
            [
                'nom' => 'Attestation employé',
                'categorie' => 'Attestations & Certificats',
                'date' => '05/08/2025'
            ],
        ];

        return view('documents-rh.index', compact('categories', 'documents'));
    }



    private function demoDataFor(string $slug): array
    {
        // Données de test (tu peux ajuster)
        if ($slug === 'cdi') {
            return [
                'company' => [
                    'name' => 'CabinetHub',
                    'address' => '10 Rue Atlas, Casablanca',
                    'footer' => 'SIRET 123 456 789 – contact@cabinethub.com – +212 5XX XX XX XX'
                ],
                'employee' => [
                    'firstname' => 'Amina',
                    'lastname'  => 'BENALI',
                    'address'   => 'Bd Zerktouni, Casablanca'
                ],
                'job' => [
                    'title' => 'Développeur Full-Stack',
                    'start_date' => '01/09/2025',
                ],
                'salary' => [
                    'amount_brut_annuel' => 240000,
                    'pay_period' => 'mensuel'
                ],
                'workplace' => ['city' => 'Casablanca'],
                'worktime'  => ['weekly_hours' => 40],
                'probation' => ['enabled' => true, 'duration_months' => 3],
                'clauses'   => ['confidentiality' => true],
                'document_date' => now()->format('d/m/Y'),
            ];
        }
        return [];
    }

    public function preview(Request $request, string $slug)
    {
        $tpl = $this->resolveTemplate($slug);

        // Permet soit d'envoyer ?demo=1 pour data d'exemple, soit des datas via JSON.
        $data = $request->boolean('demo', true)
            ? $this->demoDataFor($slug)
            : ($request->input() ?: $this->demoDataFor($slug));

        return response()->view($tpl['view'], $data);
    }

    public function generate(Request $request, string $slug)
    {
        $tpl = $this->resolveTemplate($slug);

        // Ici on prend les données du body (JSON ou form-data).
        $data = $request->all();
        if (empty($data)) {
            // fallback: si rien envoyé, on prend les données de démo
            $data = $this->demoDataFor($slug);
        }

        // Render HTML
        $html = view($tpl['view'], $data)->render();

        // Options utiles pour les images/ressources
        $pdf = Pdf::loadHTML($html)
            ->setPaper('a4', 'portrait');
        // Si tu utilises des URLs (asset('...')), décommente :
        // $pdf->setOption('isRemoteEnabled', true);

        $lastname  = Arr::get($data, 'employee.lastname', 'DOE');
        $firstname = Arr::get($data, 'employee.firstname', 'JOHN');
        $filename  = "{$slug}_{$lastname}_{$firstname}_" . now()->format('Ymd') . ".pdf";

        return $pdf->download($filename);
    }
}
