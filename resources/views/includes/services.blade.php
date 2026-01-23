<!-- Services -->
<div id="common-service-block">
    <div class="service-lede">
        <div class="lede-chip">Services</div>
        <h2>Build, scale, and stand out.</h2>
        <p class="lede-copy">Cross-functional teams that ship polished products, sharpen brands, and keep revenue flowing.</p>
    </div>

    <div class="service-tiles">
    @if(Route::currentRouteName() != 'services.web_app_development')
    <div class="service-tile">
        <div class="service-icon-bubble text-primary"><i class="fas fa-laptop-code"></i></div>
        <div class="service-meta">
            <span class="service-tag">Web • App</span>
        </div>
        <h3>Web &amp; App Development</h3>
        <p>Scalable platforms, SEO-first builds, and delightful user journeys.</p>
        <a href="{{ route('services.web_app_development') }}" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
    </div>
    @endif

    @if(Route::currentRouteName() != 'services.e_commerce')
    <div class="service-tile">
        <div class="service-icon-bubble text-warning"><i class="fas fa-shopping-cart"></i></div>
        <div class="service-meta">
            <span class="service-tag">Commerce</span>
        </div>
        <h3>E-Commerce</h3>
        <p>Conversion-focused storefronts with fast checkout and smart funnels.</p>
        <a href="{{ route('services.e_commerce') }}" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
    </div>
    @endif

    @if(Route::currentRouteName() != 'services.digital_marketing')
    <div class="service-tile">
        <div class="service-icon-bubble text-danger"><i class="fas fa-bullhorn"></i></div>
        <div class="service-meta">
            <span class="service-tag">Growth</span>
        </div>
        <h3>Digital Marketing</h3>
        <p>SEO, SEM, and automation that keep your pipeline growing.</p>
        <a href="{{ route('services.digital_marketing') }}" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
    </div>
    @endif

    @if(Route::currentRouteName() != 'services.custom_software')
    <div class="service-tile">
        <div class="service-icon-bubble text-info"><i class="fas fa-cogs"></i></div>
        <div class="service-meta">
            <span class="service-tag">Platforms</span>
        </div>
        <h3>Custom Software</h3>
        <p>APIs, workflows, and integrations tailored to your operations.</p>
        <a href="{{ route('services.custom_software') }}" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
    </div>
    @endif

    @if(Route::currentRouteName() != 'services.ui_ux_design')
    <div class="service-tile">
        <div class="service-icon-bubble text-secondary"><i class="fas fa-pen-ruler"></i></div>
        <div class="service-meta">
            <span class="service-tag">Design</span>
        </div>
        <h3>UI/UX &amp; Graphics</h3>
        <p>Design systems, motion, and visuals that amplify your brand.</p>
        <a href="{{ route('services.ui_ux_design') }}" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
    </div>
    @endif

    @if(Route::currentRouteName() != 'services.branding_identity')
    <div class="service-tile">
        <div class="service-icon-bubble text-success"><i class="fa-solid fa-crown"></i></div>
        <div class="service-meta">
            <span class="service-tag">Identity</span>
        </div>
        <h3>Branding &amp; Identity</h3>
        <p>Logos, guidelines, and cohesive stories for standout brands.</p>
        <a href="{{ route('services.branding_identity') }}" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
    </div>
    @endif
    </div>
</div>
