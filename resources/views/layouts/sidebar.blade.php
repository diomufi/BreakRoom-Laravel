<div class="wrapper">
    <input type="checkbox" id="btn" hidden>
    <label for="btn" class="menu-btn"><i class="ph-thin ph-list"></i></label>
    <nav id="sidebar">
        <div class="logo">
            <h1 style="text-align: center; color: white; font-size: 30px;">Break<span style="color: #ffe600;">Room.id</span></h1>
        </div>
        <ul class="list-items">
            <li><a href="{{ route('dashboard') }}"><i class=""></i>Home</a></li>
            <li><a href="{{ route('tablebook.create') }}"><i class=""></i>Table Book</a></li>
            <li><a href="{{ route('live-booking-table') }}"><i class=""></i>Live Table</a></li>
            <li><a href="#"><i class=""></i>Transaction</a></li>
            <li><a href="{{ route('add-member') }}"><i class=""></i>Add Member</a></li>
            <li><a href="{{ route('add-table') }}"><i class=""></i>Add Table</a></li>
            <li><a href="#"><i class=""></i>Admin Manage</a></li>
            <li><a href="#"><i class=""></i>Add Admin</a></li>
            <li><a href="#"><i class=""></i>Log Out</a></li>
        </ul>
    </nav>
</div>
