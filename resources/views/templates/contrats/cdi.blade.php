<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Contrat CDI</title>
    <style>
        @page { margin: 20mm; }
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #000; }
        h1 { font-size: 18px; margin-bottom: 10px; }
        h2 { font-size: 14px; margin-top: 18px; }
        .muted { color:#555; }
        .section { margin-top: 12px; }
        .row { display: flex; gap: 16px; }
        .col { flex: 1; }
        .footer { margin-top: 40px; font-size: 11px; color:#555; }
        /* header/footer d’entreprise éventuels en image */
        .header-img { width: 100%; margin-bottom: 12px; }
    </style>
</head>
<body>

{{-- Header image (optionnel) --}}
{{-- <img class="header-img" src="{{ public_path('assets/templates/headers/header-default.png') }}" alt="Header"> --}}

<h1>Contrat de travail à durée indéterminée (CDI)</h1>
<p class="muted">Entre l’employeur et le salarié, il a été convenu ce qui suit.</p>

<div class="section">
    <h2>1. Informations générales</h2>
    <div class="row">
        <div class="col">
            <strong>Employeur :</strong><br>
            {{ $company['name'] ?? 'Nom de l’entreprise' }}<br>
            {{ $company['address'] ?? 'Adresse entreprise' }}
        </div>
        <div class="col">
            <strong>Salarié :</strong><br>
            {{ $employee['lastname'] ?? 'NOM' }} {{ $employee['firstname'] ?? 'Prénom' }}<br>
            {{ $employee['address'] ?? 'Adresse salarié' }}
        </div>
    </div>
</div>

<div class="section">
    <h2>2. Poste et prise d’effet</h2>
    <p>
        Poste : <strong>{{ $job['title'] ?? 'Intitulé du poste' }}</strong><br>
        Date de début : <strong>{{ $job['start_date'] ?? 'JJ/MM/AAAA' }}</strong><br>
        Lieu de travail : <strong>{{ $workplace['city'] ?? 'Ville' }}</strong>
    </p>
</div>

<div class="section">
    <h2>3. Rémunération et temps de travail</h2>
    <p>
        Salaire brut annuel : <strong>
            @php
                $amount = $salary['amount_brut_annuel'] ?? null;
                echo $amount ? number_format($amount, 2, ',', ' ') . ' €' : '—';
            @endphp
        </strong><br>
        Périodicité de paie : <strong>{{ $salary['pay_period'] ?? 'mensuel' }}</strong><br>
        Temps de travail hebdo : <strong>{{ $worktime['weekly_hours'] ?? '40' }} h</strong>
    </p>
</div>

@if(!empty($probation['enabled']))
<div class="section">
    <h2>4. Période d’essai</h2>
    <p>Durée : <strong>{{ $probation['duration_months'] ?? '—' }} mois</strong></p>
</div>
@endif

@if(!empty($clauses['confidentiality']))
<div class="section">
    <h2>5. Confidentialité</h2>
    <p>Le salarié s’engage à respecter une stricte obligation de confidentialité.</p>
</div>
@endif

<div class="section">
    <h2>6. Dispositions finales</h2>
    <p>Fait à {{ $workplace['city'] ?? 'Ville' }}, le {{ $document_date ?? date('d/m/Y') }}.</p>
</div>

<div class="section">
    <table width="100%">
        <tr>
            <td width="50%">
                <strong>Pour l’employeur</strong><br><br><br>
                Nom / Fonction / Signature
            </td>
            <td width="50%">
                <strong>Le salarié</strong><br><br><br>
                {{ $employee['lastname'] ?? '' }} {{ $employee['firstname'] ?? '' }}
            </td>
        </tr>
    </table>
</div>

<div class="footer">
    {{-- Footer image ou mentions légales de l’entreprise --}}
    {{-- <img src="{{ public_path('assets/templates/footers/footer-default.png') }}" alt="Footer"> --}}
    <div class="muted">
        {{ $company['footer'] ?? 'SIRET – Email – Téléphone – Site Web' }}
    </div>
</div>

</body>
</html>
