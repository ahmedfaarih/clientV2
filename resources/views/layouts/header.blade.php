<div id="top"></div>
<nav class="navbar navbar-light fixed-top bg-white transparency border-bottom border-light" id="transmenu">
    <div class="container-fluid"><a class="navbar-brand text-success" href="index.html">&nbsp;</a><button class="navbar-toggler collapsed" data-toggle="collapse" id="nav1" onclick="openNav()"><span></span><span></span><span></span></button><button class="navbar-toggler" data-toggle="collapse" id="nav2" onclick="closeNav()" style="display: none"><span></span><span></span><span></span></button></div>
</nav>
<div class="d-flex flex-column justify-content-center align-content-center overlay-nav" id="myNav">
    <div class="d-flex flex-column justify-content-center align-items-center" id="content-nav">
        <div class="d-flex align-items-center searchbar"><input type="text" class="search_input" placeholder="Search..."><a class="search_icon" href="#"><i class="fa fa-search"></i></a></div>
        <div class="d-flex flex-column align-items-center overlay-content"><a href="{{route('home')}}">Home</a>
        <a href="{{route('partners')}}">Partners</a>
        <a href="{{route('areas')}}">Practice Areas</a>
        <a href="{{route('values')}}">Our Core Values</a>
        <a href="{{route('bots')}}">Legal Bots</a>
        <a href="#">The Start-up Lawyers </a>
        <a href="{{route('publications')}}">Publications</a>
        <a href="{{'admin'}}">Clientio</a></div>
    </div>
</div>
