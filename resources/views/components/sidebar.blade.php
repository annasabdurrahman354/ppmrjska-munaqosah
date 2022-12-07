<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>



            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/Admin/LanguageSwitcher.php')))
                    <livewire:admin.language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/users*")||request()->is("admin/dewan-guru*")||request()->is("admin/permissions*")||request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('dewan_guru_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/dewan-guru*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.dewan-guru.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-chalkboard-teacher">
                                        </i>
                                        {{ trans('cruds.dewanGuru.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('munaqosah_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/jadwal-munaqosah*")||request()->is("admin/plot-munaqosah*")||request()->is("admin/nilai-munaqosah*")||request()->is("admin/materi-munaqosah*")||request()->is("admin/kalender-munaqosah*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-clipboard">
                            </i>
                            {{ trans('cruds.munaqosah.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('jadwal_munaqosah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/jadwal-munaqosah*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.jadwal-munaqosah.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-calendar-alt">
                                        </i>
                                        {{ trans('cruds.jadwalMunaqosah.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('plot_munaqosah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/plot-munaqosah*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.plot-munaqosah.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-id-badge">
                                        </i>
                                        {{ trans('cruds.plotMunaqosah.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('nilai_munaqosah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/nilai-munaqosah*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.nilai-munaqosah.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-star">
                                        </i>
                                        {{ trans('cruds.nilaiMunaqosah.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('materi_munaqosah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/materi-munaqosah*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.materi-munaqosah.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-book-open">
                                        </i>
                                        {{ trans('cruds.materiMunaqosah.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('kalender_munaqosah_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/kalender-munaqosah*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.kalender-munaqosah.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-calendar">
                                        </i>
                                        {{ trans('cruds.kalenderMunaqosah.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/provinsis*")||request()->is("admin/kabupatens*")||request()->is("admin/kecamatans*")||request()->is("admin/kelurahans*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-database">
                            </i>
                            {{ trans('cruds.management.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('provinsi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/provinsis*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.provinsis.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        {{ trans('cruds.provinsi.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('kabupaten_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/kabupatens*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.kabupatens.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        {{ trans('cruds.kabupaten.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Admin/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("admin.profile") }}" class="{{ request()->is("admin/profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>