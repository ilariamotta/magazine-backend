<header class="navbar bg-white border-bottom px-3 px-md-4 py-3 sticky-top">
    <div class="container-fluid px-0">

        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-outline-dark d-md-none"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#adminSidebar"
                    aria-controls="adminSidebar">
                ☰
            </button>

            <span class="fw-semibold text-muted">
                Area Amministrativa - PIXEL POP
            </span>
        </div>

        <span class="fw-bold text-end">
            {{ auth()->user()->name }}
        </span>

    </div>
</header>