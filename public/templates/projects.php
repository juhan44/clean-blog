<?php 
    include 'partials/header-admin.php';
?>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <h1 class="greeting">Projects</h1>
                    <p class="greeting-sub">Manage and track your team's work</p>
                </div>
                <button class="btn btn-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>New Project</button>
            </div>

            <!-- Kanban Board -->
            <div class="kanban-board">
                <!-- To Do -->
                <div class="kanban-column">
                    <div class="kanban-header"><span class="kanban-title">To Do</span><span class="kanban-count">4</span></div>
                    <div class="kanban-cards">
                        <div class="kanban-card"><div class="kanban-card-title">Design System Updates</div><div class="kanban-card-desc">Update color palette and typography scale for v2.0</div><div class="kanban-card-footer"><span class="badge badge-blue">Design</span><div class="avatar-group"><div class="avatar blue">SC</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">User Research Report</div><div class="kanban-card-desc">Compile findings from Q4 user interviews</div><div class="kanban-card-footer"><span class="badge badge-orange">Research</span><div class="avatar-group"><div class="avatar green">EW</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Mobile App Wireframes</div><div class="kanban-card-desc">Create low-fidelity wireframes for iOS app</div><div class="kanban-card-footer"><span class="badge badge-blue">Design</span><div class="avatar-group"><div class="avatar blue">SC</div><div class="avatar purple">JL</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">API Documentation</div><div class="kanban-card-desc">Write comprehensive docs for REST endpoints</div><div class="kanban-card-footer"><span class="badge badge-green">Dev</span><div class="avatar-group"><div class="avatar orange">MT</div></div></div></div>
                    </div>
                </div>

                <!-- In Progress -->
                <div class="kanban-column">
                    <div class="kanban-header"><span class="kanban-title">In Progress</span><span class="kanban-count">3</span></div>
                    <div class="kanban-cards">
                        <div class="kanban-card"><div class="kanban-card-title">Dashboard Redesign</div><div class="kanban-card-desc">Implement new analytics dashboard with charts</div><div class="progress-bar" style="margin-bottom: 0.75rem;"><div class="progress-fill accent" style="width: 65%;"></div></div><div class="kanban-card-footer"><span class="badge badge-green">Dev</span><div class="avatar-group"><div class="avatar blue">SC</div><div class="avatar orange">MT</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Payment Integration</div><div class="kanban-card-desc">Integrate Stripe for subscription billing</div><div class="progress-bar" style="margin-bottom: 0.75rem;"><div class="progress-fill accent" style="width: 40%;"></div></div><div class="kanban-card-footer"><span class="badge badge-green">Dev</span><div class="avatar-group"><div class="avatar orange">MT</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Email Templates</div><div class="kanban-card-desc">Design responsive email templates for campaigns</div><div class="progress-bar" style="margin-bottom: 0.75rem;"><div class="progress-fill accent" style="width: 80%;"></div></div><div class="kanban-card-footer"><span class="badge badge-blue">Design</span><div class="avatar-group"><div class="avatar green">EW</div></div></div></div>
                    </div>
                </div>

                <!-- Review -->
                <div class="kanban-column">
                    <div class="kanban-header"><span class="kanban-title">Review</span><span class="kanban-count">2</span></div>
                    <div class="kanban-cards">
                        <div class="kanban-card"><div class="kanban-card-title">Authentication Flow</div><div class="kanban-card-desc">OAuth2 implementation with social login options</div><div class="kanban-card-footer"><span class="badge badge-green">Dev</span><div class="avatar-group"><div class="avatar purple">JL</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Landing Page Copy</div><div class="kanban-card-desc">Review and finalize marketing copy for launch</div><div class="kanban-card-footer"><span class="badge badge-orange">Marketing</span><div class="avatar-group"><div class="avatar green">EW</div><div class="avatar blue">SC</div></div></div></div>
                    </div>
                </div>

                <!-- Done -->
                <div class="kanban-column">
                    <div class="kanban-header"><span class="kanban-title">Done</span><span class="kanban-count">5</span></div>
                    <div class="kanban-cards">
                        <div class="kanban-card"><div class="kanban-card-title">Brand Guidelines</div><div class="kanban-card-desc">Complete brand identity documentation</div><div class="kanban-card-footer"><span class="badge badge-blue">Design</span><div class="avatar-group"><div class="avatar blue">SC</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Database Migration</div><div class="kanban-card-desc">Migrate legacy data to new schema</div><div class="kanban-card-footer"><span class="badge badge-green">Dev</span><div class="avatar-group"><div class="avatar orange">MT</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">User Onboarding Flow</div><div class="kanban-card-desc">New user welcome sequence and tooltips</div><div class="kanban-card-footer"><span class="badge badge-blue">Design</span><div class="avatar-group"><div class="avatar green">EW</div><div class="avatar purple">JL</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Performance Audit</div><div class="kanban-card-desc">Lighthouse audit and optimization</div><div class="kanban-card-footer"><span class="badge badge-green">Dev</span><div class="avatar-group"><div class="avatar orange">MT</div></div></div></div>
                        <div class="kanban-card"><div class="kanban-card-title">Security Review</div><div class="kanban-card-desc">Third-party security assessment completed</div><div class="kanban-card-footer"><span class="badge badge-red">Security</span><div class="avatar-group"><div class="avatar purple">JL</div></div></div></div>
                    </div>
                </div>
            </div>
        </main>

<?php include 'partials/footer-admin.php'; ?>