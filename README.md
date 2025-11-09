# 🧭 CabinetHub

### Where People, Assets, and Insight Connect Seamlessly

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

</p>
<p align="center">



```
╔═══════════════════════════════════════════════════════════════╗
║                                                               ║
║   ██████╗ █████╗ ██████╗ ██╗███╗   ██╗███████╗████████╗       ║
║  ██╔════╝██╔══██╗██╔══██╗██║████╗  ██║██╔════╝╚══██╔══╝       ║
║  ██║     ███████║██████╔╝██║██╔██╗ ██║█████╗     ██║          ║
║  ██║     ██╔══██║██╔══██╗██║██║╚██╗██║██╔══╝     ██║          ║
║  ╚██████╗██║  ██║██████╔╝██║██║ ╚████║███████╗   ██║          ║
║   ╚═════╝╚═╝  ╚═╝╚═════╝ ╚═╝╚═╝  ╚═══╝╚══════╝   ╚═╝          ║
║                                                               ║
║              ╦ ╦╦ ╦╔╗                                         ║
║              ╠═╣║ ║╠╩╗                                        ║
║              ╩ ╩╚═╝╚═╝                                        ║
║                                                               ║
║    > System Initialized                                       ║
║    > Connecting modules...                                    ║
║    > Ready to orchestrate your organization                   ║
║                                                               ║
╚═══════════════════════════════════════════════════════════════╝
```
</p>

### Our Vision

Imagine a single platform where every thread of your organization-**people**, **resources**, **maintenance schedules**, **purchases**, and **audits**-weaves together into a living tapestry of operational clarity. 

**CabinetHub** was born from a simple napkin sketch and a bold question: *What if managing complexity didn't have to feel complex?*

Built for organizations that refuse to settle for fragmented tools and scattered data, CabinetHub transforms the chaos of daily operations into a symphony of coordinated action. It's not just a management system-it's a **digital nervous system** for your entire enterprise.

From tracking employee journeys to monitoring asset lifecycles, from purchase requests to real-time auditing, CabinetHub ensures that nothing slips through the cracks. Every click, every update, every decision leaves a traceable footprint in an audit trail designed for transparency and accountability.

This isn't about managing your organization. This is about **orchestrating** it.

---

## 🏗️ The Architecture

At the heart of CabinetHub lies a carefully orchestrated seven-layer architecture-each layer a stepping stone from user interaction to data permanence, from request to insight.

![System Overview](https://image2url.com/images/1762695939234-481d748c-d2df-4798-b20f-e470525d39cd.png)

### The Seven Pillars

![System Overview](https://image2url.com/images/1762699735172-f501c6b4-fc26-4310-ad6d-c0b2dd22f5ec.png)

**At the center lives the Laravel Core**, orchestrating every cabinet, every collaborator, every audit trail. Requests flow upward through authentication gates, business logic transformers, and data persistence layers. Insights flow downward through analytical engines and dashboard renderers. 

And at every step, the **EventAudit** and **SecurityAudit** systems watch, record, and remember.

---

## 🌠 The Ecosystem

CabinetHub is more than a monolith-it's a constellation of interconnected modules, each serving a distinct purpose, yet all orbiting the same gravitational center.

<div align="center">

### 🧑‍💼 **Ressources Humaines**
*The Human Dimension*

</div>

At the heart of every organization are its people. The HR module manages:

- **Collaborateurs** - Employee profiles, contact details, career history
- **Postes** - Job positions, hierarchies, departmental structures
- **Congés** - Leave requests, approvals, balance tracking
- **Présence** - Attendance logging, shift management
- **Evolution** - Performance reviews, promotions, career progression

---

<div align="center">

### 🧰 **Ressources et Maintenance**
*The Asset Lifecycle*

</div>

From desks to servers, every resource has a story. This module tells it:

- **Ressources** - Physical and digital assets inventory
- **Categories** - Classification schemas for organized retrieval
- **Inventaires** - Periodic audits, condition assessments
- **Maintenance** - Scheduled repairs, service history, downtime tracking

Each resource is tagged, tracked, and auditable-ensuring nothing disappears into the organizational void.

---

<div align="center">

### 🛒 **Achats et Audit**
*The Procurement Pipeline*

</div>

Every purchase tells a story of need, approval, and fulfillment:

- **Demande_Achat** - Purchase requisitions from any department
- **Document_Achat** - Contracts, invoices, proof of purchase
- **EventAudit** - Timestamp-stamped logs of every action
- **SecurityAudit** - Compliance checks, access monitoring

The audit trail ensures that every franc, every decision, every approval is eternally transparent.

---

## 🧬 The Data Soul

Behind the interface, behind the workflows, lies the **Entity-Relationship Model**-the DNA of CabinetHub.

![System Overview](https://image2url.com/images/1762697010895-14ad5eb8-1eb9-4210-beff-68e36410e3ef.png)

### The Story of Connection

Every **Collaborateur** belongs to a **Poste**.  
Every **Ressource** has a **Category**.  
Every **EventAudit** echoes the action of a **User**.  
Every **Demande_Achat** flows through an **approval chain**.

These aren't just tables-they're relationships. They're the invisible threads that bind an organization together, now made visible, queryable, and actionable.

The data model is designed for:
- **Referential Integrity** - No orphaned records, no broken links
- **Audit Traceability** - Every insert, update, delete is logged
- **Scalable Extensibility** - New modules can plug in without disruption

---

## 🛤️ The Journey

Every user embarks on a journey through CabinetHub. Here's what that journey looks like:

![System Overview](https://image2url.com/images/1762697126442-32b996e8-9c79-4dd0-9869-66cda307882c.png)
### The Collaborateur's Path

1. **Login** → Authentication gates verify identity and permissions
2. **Dashboard Awakens** → Real-time metrics, pending approvals, notifications
3. **Interaction Begins** → Requests are made, resources are booked, forms are submitted
4. **Data Flows** → Every action ripples through the system, updating states
5. **Audits Echo** → Silently, invisibly, every event is chronicled
6. **Insights Emerge** → Dashboards refresh, reports generate, trends surface

The user never sees the complexity. They only experience the clarity.

---

## 🔮 Installation Ritual

Ready to summon CabinetHub into your local environment? Follow the sacred steps:

### Prerequisites

- PHP >= 8.2
- Composer
- MySQL >= 5.7
- Node.js & NPM 

### The Summoning

```bash
# Clone the repository from the void
git clone https://github.com/zakariaayl/CabinetHub.git
cd CabinetHub

# Summon the dependencies
composer install

# Prepare the environment
cp .env.example .env

# Generate the application key
php artisan key:generate

# Configure your database in .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=cabinethub
# DB_USERNAME=root
# DB_PASSWORD=

# Forge the database schema
php artisan migrate --seed

# Awaken the server
php artisan serve
```

💡 **Pro Tip**: Use `php artisan db:seed` to populate your database with sample data-Collaborateurs, Ressources, and Audits-so you can explore the system immediately.

⚠️ **Warning**: Ensure your `.env` file points to a real MySQL database. CabinetHub's migrations are extensive and expect a relational database.

---

## 🛠️ Tech Stack & System Design

<div align="center">

| Layer | Technology | Purpose |
|-------|-----------|---------|
| **Frontend** | Blade Templates + Bootstrap 5 | Responsive, server-rendered UI |
| **Backend** | Laravel 12.x (PHP 8.2+) | RESTful logic, Eloquent ORM |
| **Database** | MySQL 5.7+ | Relational persistence, transactional integrity |
| **Authentication** | Laravel Sanctum / Breeze | Secure session management |
| **Auditing** | Custom EventAudit Models | Immutable action logs |
| **File Storage** | Laravel Storage (local/cloud) | Document & media management |

</div>

## 🚀 Future Frontier

CabinetHub is not finished-it's evolving. Here are the **coming planets in our galaxy**:

### 🔭 On the Horizon

- **🧠 Predictive Analytics** - AI-driven insights into resource utilization, employee turnover, maintenance schedules
- **☁️ Cloud Integration** - Sync with Google Drive, Dropbox, and cloud-based ERP systems
- **📱 Mobile App** - Native iOS and Android companions for on-the-go management
- **🔒 Advanced RBAC** - Granular role-based access control with custom permission sets
- **🌐 Multi-Tenancy** - Host multiple organizations on a single CabinetHub instance
- **📊 BI Dashboards** - Embedded Power BI / Tableau-style analytics

### 🌱 Roadmap

| Phase | Features | Target |
|-------|----------|--------|
| **Phase 1** | Core CRUD, Auditing, Reporting | ✅ Complete |
| **Phase 2** | API Layer, Webhooks, Notifications | 🚧 In Progress |
| **Phase 3** | AI Analytics, Mobile Apps | 🔜 Coming Soon |
| **Phase 4** | Multi-Tenancy, Enterprise Features | 🔮 Future |

---

## 👥 Credits & Philosophy

**CabinetHub** is crafted with care by:

- **Zakariae Ayougil** - Developer & System Architect
- **Omar Lahjouji** - Developer & System Architect

### Our Philosophy

> *"Great systems are not coded-they're cultivated."*

We believe that software should feel **alive**-responsive, intuitive, and ever-adapting to the needs of those who use it. CabinetHub is our attempt to bring that philosophy to life.

Every commit, every feature, every line of code is written with the user in mind. We don't build for machines. We build for humans.

---

<div align="center">

### ⭐ If CabinetHub helps your organization, consider giving it a star on GitHub

```
   ⭐  ⭐  ⭐  ⭐  ⭐
 
  Every star is a signal.
  Every fork is a conversation.
  Every contribution is a gift.
```

---

**Made with ❤️ and countless cups of coffee**

*From a single napkin sketch to a unified management platform-this is CabinetHub.*

</div>
