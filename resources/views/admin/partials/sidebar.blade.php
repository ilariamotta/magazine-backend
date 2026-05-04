{{-- MOBILE OFFCANVAS --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
    <div class="offcanvas-header border-bottom">
        <div>
            <h5 class="admin-brand mb-0" id="adminSidebarLabel">
                PIXEL <span>POP</span>
            </h5>
            <small class="text-muted text-uppercase">Admin panel</small>
        </div>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Chiudi"></button>
    </div>

    <div class="offcanvas-body">
        <nav>
            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.articles.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                Articoli
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                Categorie
            </a>

            <a href="{{ route('admin.authors.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
                Autori
            </a>
        </nav>
    </div>
</div>


{{-- DESKTOP SIDEBAR --}}
<aside class="admin-sidebar d-none d-md-block col-md-3 col-lg-2 bg-white border-end p-0">
    <div class="p-4 border-bottom">
        <h4 class="admin-brand mb-0">
            PIXEL <span>POP</span>
        </h4>
        <small class="text-muted text-uppercase">Admin panel</small>
    </div>

    <nav class="p-3">
        <a href="{{ route('admin.dashboard') }}"
           class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.articles.index') }}"
           class="admin-nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            Articoli
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="admin-nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            Categorie
        </a>

        <a href="{{ route('admin.authors.index') }}"
           class="admin-nav-link {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
            Autori
        </a>
    </nav>
</aside>