<!-- Services -->

        <div class="row g-4">
            @if(Route::currentRouteName() != 'services.web_app_development')
            <div class="col-md-6 col-lg-4">
                <div class="card service-card text-center p-4 bg-white shadow rounded">
                    <div class="hover-overlay p-4">
                        <p class="text-white mb-3">
                            Responsive, scalable platforms using modern tech stacks — tailored for
                            performance and user engagement.
                        </p>
                        <a href="{{ route('services.web_app_development') }}" class="btn btn-gradient btn-sm">
                            Click to Read More
                        </a>
                    </div>
                    <i class="fas fa-laptop-code fa-2x mb-3 text-primary mx-auto"></i>
                    <h3 class="h5">Web &amp; App Dev</h3>
                    <p class="text-muted lead">Build powerful digital experiences</p>
                </div>
            </div>
            @endif
             @if(Route::currentRouteName() != 'services.e_commerce')
            <div class="col-md-6 col-lg-4">
                <div class="card service-card text-center p-4 bg-white shadow rounded">
                    <div class="hover-overlay p-4">
                        <p class="text-white mb-3">
                            Custom online shops with intuitive UX, mobile optimization, and fast-loading
                            backend infrastructure.
                        </p>
                        <a href="{{ route('services.e_commerce') }}" class="btn btn-gradient btn-sm">
                            Click to Read More
                        </a>
                    </div>
                    <i class="fas fa-shopping-cart fa-2x mb-3 text-success mx-auto"></i>
                    <h3 class="h5">E-Commerce</h3>
                    <p class="text-muted lead">Sell smarter with secure, seamless stores</p>
                </div>
            </div>
             @endif
             @if(Route::currentRouteName() != 'services.digital_marketing')
            <div class="col-md-6 col-lg-4">
                <div class="card service-card text-center p-4 bg-white shadow rounded">
                    <div class="hover-overlay p-4">
                        <p class="text-white mb-3">
                            Full-funnel digital marketing, SEO campaigns, and brand amplification for
                            measurable growth.
                        </p>
                        <a href="{{ route('services.digital_marketing') }}" class="btn btn-gradient btn-sm">
                            Click to Read More
                        </a>
                    </div>
                    <i class="fas fa-bullhorn fa-2x mb-3 text-warning mx-auto"></i>
                    <h3 class="h5">Digital Marketing</h3>
                    <p class="text-muted lead">Boost visibility with strategic marketing</p>
                </div>
            </div>
             @endif
             @if(Route::currentRouteName() != 'services.custom_software')
            <div class="col-md-6 col-lg-4">
                <div class="card service-card text-center p-4 bg-white shadow rounded">
                    <div class="hover-overlay p-4">
                        <p class="text-white mb-3">
                            Enterprise-ready tools for workflow optimization, scalable processes, and
                            data-driven decision-making.
                        </p>
                        <a href="{{ route('services.custom_software') }}" class="btn btn-gradient btn-sm">
                            Click to Read More
                        </a>
                    </div>
                    <i class="fas fa-cogs fa-2x mb-3 text-info mx-auto"></i>
                    <h3 class="h5">Custom Software</h3>
                    <p class="text-muted lead">Automate smarter. Operate better</p>
                </div>
            </div>
             @endif
             @if(Route::currentRouteName() != 'services.ui_ux_design')
            <div class="col-md-6 col-lg-4">
                <div class="card service-card text-center p-4 bg-white shadow rounded">
                    <div class="hover-overlay p-4">
                        <p class="text-white mb-3">
                            Modern UI/UX, brand identity, and creative storytelling — from logos to full
                            digital design systems.
                        </p>
                        <a href="{{ route('services.ui_ux_design') }}" class="btn btn-gradient btn-sm">
                            Click to Read More
                        </a>
                    </div>
                    <i class="fas fa-paint-brush fa-2x mb-3 text-danger mx-auto"></i>
                    <h3 class="h5">Graphics &amp; UI</h3>
                    <p class="text-muted lead">Designs that speak your brand</p>
                </div>
            </div>
             @endif
             @if(Route::currentRouteName() != 'services.branding_identity')
            <div class="col-md-6 col-lg-4">
                <div class="card service-card text-center p-4 bg-white shadow rounded">
                    <div class="hover-overlay p-4">
                        <p class="text-white mb-3">
                            End-to-end branding — logo design, brand guidelines, social media kits, and marketing collateral that make your brand stand out.
                        </p>
                        <a href="{{ route('services.branding_identity') }}" class="btn btn-gradient btn-sm">
                            Click to Read More
                        </a>
                    </div>
                    <i class="fa-solid fa-crown fa-2x mb-3 text-danger mx-auto"></i>
                    <h3 class="h5">Branding &amp; Identity</h3>
                    <p class="text-muted lead">Building brands that stand out</p>
                </div>
            </div>
             @endif
        </div>
