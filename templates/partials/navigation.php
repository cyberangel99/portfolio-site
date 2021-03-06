<nav uk-sticky="animation: uk-animation-slide-top; top: 5;" class="nav uk-padding-small">
    <div uk-grid>
        <div class="uk-width-1-4@s uk-width-1-2 uk-text-left">
            <a href="/" class="logo_home"><img class="uk-responsive-width uk-responsive-height logo"
                src="./assets/images/codelogo2.png" alt="logo" />
                mary<span class="lastname">green</span></a>
        </div>
        <div class="uk-width-3-4@s uk-width-1-2 uk-text-left uk-visible@s">
            <ul class="list transformed uk-visible@s navigation"
                uk-scrollspy-nav="closest: li > a; scroll: true; offset: 56">
                <li><a href="#hero"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#welcome"><i class="fa fa-cogs"></i>Welcome</a></li>
                <li><a href="#about"><i class="fa fa-user-circle"></i>About</a></li>
                <li><a href="#skills"><i class="fa fa-list"></i>Skills</a></li>
                <li><a href="#portfolio"><i class="fa fa-laptop"></i>Portfolio</a></li>
                <li><a href="#contact"><i class="fa fa-envelope"></i>Contact Me</a></li>
            </ul>
        </div>
        <div class="uk-width-1-4@s uk-width-1-2 uk-hidden@s uk-text-center firstname">
            <i class="fa fa-bars uk-hidden@s canvas uk-align-right" uk-toggle="target: #offcanvas"
                aria-hidden="true"></i>
        </div>
    </div>
</nav>