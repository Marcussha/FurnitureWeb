<div id="mySidenav" class="sidenav">
    <ul class="menu_sidebar">
        <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
        <li>
            <a href="javascript:void(0)" onclick="toggleDropdown('categoryDropdown')">01. Category</a>
            <ul id="categoryDropdown" class="dropdown-content">
                @foreach ($categories as $category)
                    <li><a href="{{ route('category.show', $category->categoryID) }}">{{ $category->categoryName }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ url('list-product') }}">02. What We Do</a></li>
        <li><a href="{{ url('contact') }}">03. Contact Us</a></li>
        <li><a href="{{ route('login') }}">04. Login</a></li>
        <li><a href="{{ route('home') }}">05. Profile</a></li>
    </ul>
</div>

<!-- JavaScript for Sidebar -->
<script>
    function toggleDropdown(id) {
        var element = document.getElementById(id);
        element.classList.toggle('show');
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px"; // Adjust as needed
    }
</script>
