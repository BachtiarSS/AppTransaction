<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : ' ' }}" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('category') ? 'active' : ' ' }}" href="{{ route('category.index') }}">
                    <span data-feather="file-text"></span>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('items') ? 'active' : ' ' }}" href="{{ route('item.index') }}">
                    <span data-feather="minus-square"></span>
                    Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('transaction*') ? 'active' : ' ' }}""
                    href="{{ route('transaction.index') }}">
                    <span data-feather="trello"></span>
                    Transaction
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="user"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">
                    <span data-feather="wind"></span>
                    About
                </a>
            </li>
        </ul>

    </div>
</nav>
