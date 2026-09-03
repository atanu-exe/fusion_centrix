<svg class="fc-ecosystem-svg" viewBox="0 0 900 700" xmlns="http://www.w3.org/2000/svg" role="img"
    aria-labelledby="title desc">
    <title id="title">FusionCentrix complete digital ecosystem</title>
    <desc id="desc">Interactive technology ecosystem representing web development, app development, graphic design,
        branding, SEO, cloud and AI automation.</desc>
    <defs>
        <linearGradient id="blueCyan" x1="0" y1="0" x2="1" y2="1">
            <stop stop-color="#1565FF" />
            <stop offset="1" stop-color="#00C2FF" />
        </linearGradient>
        <linearGradient id="glass" x1="0" y1="0" x2="1" y2="1">
            <stop stop-color="#102A5A" stop-opacity=".96" />
            <stop offset="1" stop-color="#07142B" stop-opacity=".82" />
        </linearGradient>
        <radialGradient id="core">
            <stop stop-color="#00C2FF" stop-opacity=".8" />
            <stop offset=".5" stop-color="#1565FF" stop-opacity=".25" />
            <stop offset="1" stop-color="#1565FF" stop-opacity="0" />
        </radialGradient>
        <filter id="glow">
            <feGaussianBlur stdDeviation="7" result="b" />
            <feMerge>
                <feMergeNode in="b" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
        <filter id="soft">
            <feGaussianBlur stdDeviation="25" />
        </filter>
        <style>
            .fc-service {
                cursor: pointer;
                transform-box: fill-box;
                transform-origin: center;
                transition: transform .3s ease, opacity .3s ease
            }

            .fc-service-card {
                fill: url(#glass);
                stroke: #1565FF;
                stroke-opacity: .65;
                stroke-width: 1.5
            }

            .fc-service:hover,
            .fc-service.is-active {
                transform: translateY(-8px) scale(1.035)
            }

            .fc-service.is-active .fc-service-card {
                stroke: #00C2FF;
                stroke-width: 2;
                filter: url(#glow)
            }

            .fc-label {
                fill: #fff;
                font: 650 15px Inter, Arial, sans-serif
            }

            .fc-sub {
                fill: #9fb1d1;
                font: 400 10px Inter, Arial, sans-serif
            }

            .fc-icon {
                fill: none;
                stroke: #00C2FF;
                stroke-width: 2.2;
                stroke-linecap: round;
                stroke-linejoin: round
            }

            .fc-link {
                fill: none;
                stroke: #1565FF;
                stroke-opacity: .32;
                stroke-width: 1.5;
                stroke-dasharray: 5 9
            }

            .fc-link.active {
                stroke: #00C2FF;
                stroke-opacity: .9;
                filter: url(#glow)
            }

            .fc-particle {
                fill: #00C2FF;
                filter: url(#glow)
            }

            .fc-core {
                animation: fcCore 3s ease-in-out infinite
            }

            .fc-ring {
                transform-origin: 450px 350px;
                animation: fcRotate 18s linear infinite
            }

            .fc-ring-reverse {
                transform-origin: 450px 350px;
                animation: fcRotateReverse 14s linear infinite
            }

            .fc-service {
                animation: fcAppear .7s cubic-bezier(.22, 1, .36, 1) both
            }

            .fc-service:nth-of-type(1) {
                animation-delay: .15s
            }

            .fc-service:nth-of-type(2) {
                animation-delay: .3s
            }

            .fc-service:nth-of-type(3) {
                animation-delay: .45s
            }

            .fc-service:nth-of-type(4) {
                animation-delay: .6s
            }

            .fc-service:nth-of-type(5) {
                animation-delay: .75s
            }

            .fc-service:nth-of-type(6) {
                animation-delay: .9s
            }

            .fc-service:nth-of-type(7) {
                animation-delay: 1.05s
            }

            @keyframes fcAppear {
                from {
                    opacity: 0;
                    transform: scale(.72) translateY(20px)
                }

                to {
                    opacity: 1;
                    transform: scale(1) translateY(0)
                }
            }

            @keyframes fcCore {

                0%,
                100% {
                    transform: scale(1);
                    opacity: .9
                }

                50% {
                    transform: scale(1.035);
                    opacity: 1
                }
            }

            @keyframes fcRotate {
                to {
                    transform: rotate(360deg)
                }
            }

            @keyframes fcRotateReverse {
                to {
                    transform: rotate(-360deg)
                }
            }

            @media(prefers-reduced-motion:reduce) {

                .fc-core,
                .fc-ring,
                .fc-ring-reverse,
                .fc-service {
                    animation: none !important
                }
            }
        </style>
    </defs>

    <!-- ambient field -->
    <circle cx="450" cy="350" r="260" fill="url(#core)" opacity=".22" filter="url(#soft)" />
    <g class="fc-ring">
        <ellipse cx="450" cy="350" rx="355" ry="185" class="fc-link" />
        <circle cx="805" cy="350" r="4" class="fc-particle" />
    </g>
    <g class="fc-ring-reverse">
        <ellipse cx="450" cy="350" rx="270" ry="125" class="fc-link" opacity=".65" />
    </g>

    <!-- service connections -->
    <g id="fc-connections">
        <path id="line-web" d="M450 350L145 105" class="fc-link" />
        <path id="line-app" d="M450 350L755 105" class="fc-link" />
        <path id="line-graphic" d="M450 350L105 300" class="fc-link" />
        <path id="line-brand" d="M450 350L795 300" class="fc-link" />
        <path id="line-cloud" d="M450 350L175 575" class="fc-link" />
        <path id="line-ai" d="M450 350L725 575" class="fc-link" />
        <path id="line-seo" d="M450 350L450 590" class="fc-link" />
    </g>

    <!-- center -->
    <g class="fc-core">
        <circle cx="450" cy="350" r="108" fill="#07142B" stroke="url(#blueCyan)" stroke-width="2.5" />
        <circle cx="450" cy="350" r="88" fill="none" stroke="#00C2FF" stroke-opacity=".22" />
        <circle cx="450" cy="350" r="72" fill="url(#core)" />
        <text x="450" y="345" text-anchor="middle" fill="#fff" font-family="Inter,Arial,sans-serif" font-size="45"
            font-weight="800">FC</text>
        <text x="450" y="372" text-anchor="middle" fill="#dce8ff" font-family="Inter,Arial,sans-serif" font-size="11"
            letter-spacing="3">FUSIONCENTRIX</text>
    </g>

    <!-- reusable service cards -->
    <g class="fc-service" data-service="web" data-line="line-web" tabindex="0" role="button"
        aria-label="Web Development">
        <rect x="40" y="55" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="76" cy="94" r="23" fill="#1565FF" fill-opacity=".14" />
        <path d="M63 84h26v21H63zM67 89h3M73 89h3M79 89h6M67 98h16" class="fc-icon" />
        <text x="110" y="96" class="fc-label">Web Development</text><text x="110" y="116" class="fc-sub">Websites
            &amp; platforms</text>
    </g>

    <g class="fc-service" data-service="app" data-line="line-app" tabindex="0" role="button"
        aria-label="App Development">
        <rect x="650" y="55" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="686" cy="94" r="23" fill="#00C2FF" fill-opacity=".12" />
        <rect x="675" y="79" width="22" height="30" rx="4" class="fc-icon" />
        <circle cx="686" cy="103" r="1.5" fill="#00C2FF" />
        <text x="720" y="96" class="fc-label">App Development</text><text x="720" y="116" class="fc-sub">Mobile
            experiences</text>
    </g>

    <g class="fc-service" data-service="graphic" data-line="line-graphic" tabindex="0" role="button"
        aria-label="Graphic Design">
        <rect x="10" y="250" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="46" cy="289" r="23" fill="#1565FF" fill-opacity=".14" />
        <path d="M36 301l15-15 8 8-15 15-9 2zM50 286l4-4 8 8-4 4" class="fc-icon" />
        <text x="80" y="291" class="fc-label">Graphic Design</text><text x="80" y="311" class="fc-sub">Creative visual
            systems</text>
    </g>

    <g class="fc-service" data-service="brand" data-line="line-brand" tabindex="0" role="button"
        aria-label="Branding and Identity">
        <rect x="680" y="250" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="716" cy="289" r="23" fill="#00C2FF" fill-opacity=".12" />
        <path d="M716 276l14 7v10c0 9-6 14-14 18-8-4-14-9-14-18v-10zM710 293h12M716 287v12" class="fc-icon" />
        <text x="750" y="291" class="fc-label">Branding &amp; Identity</text><text x="750" y="311"
            class="fc-sub">Brand presence</text>
    </g>

    <g class="fc-service" data-service="cloud" data-line="line-cloud" tabindex="0" role="button"
        aria-label="Cloud Solutions">
        <rect x="65" y="525" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="101" cy="564" r="23" fill="#1565FF" fill-opacity=".14" />
        <path
            d="M87 571c-2-8 4-14 11-14 3-7 14-7 18 1 8 0 12 5 11 11-1 7-6 10-13 10H96c-5 0-9-3-9-8zM99 559v14M94 568h10"
            class="fc-icon" />
        <text x="135" y="566" class="fc-label">Cloud Solutions</text><text x="135" y="586" class="fc-sub">Secure
            infrastructure</text>
    </g>

    <g class="fc-service" data-service="ai" data-line="line-ai" tabindex="0" role="button"
        aria-label="AI and Automation">
        <rect x="625" y="525" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="661" cy="564" r="23" fill="#00C2FF" fill-opacity=".12" />
        <rect x="649" y="552" width="24" height="24" rx="5" class="fc-icon" />
        <path d="M655 546v6M667 546v6M655 576v6M667 576v6M643 558h6M673 558h6M643 570h6M673 570h6" class="fc-icon" />
        <text x="695" y="566" class="fc-label">AI &amp; Automation</text><text x="695" y="586" class="fc-sub">Smarter
            workflows</text>
    </g>

    <g class="fc-service" data-service="seo" data-line="line-seo" tabindex="0" role="button"
        aria-label="SEO and Growth">
        <rect x="345" y="555" width="210" height="100" rx="18" class="fc-service-card" />
        <circle cx="381" cy="594" r="23" fill="#1565FF" fill-opacity=".14" />
        <circle cx="378" cy="591" r="10" class="fc-icon" />
        <path d="M386 599l9 9M370 610v-7M378 610v-14M386 610v-19" class="fc-icon" />
        <text x="415" y="596" class="fc-label">SEO &amp; Growth</text><text x="415" y="616" class="fc-sub">Visibility
            &amp; results</text>
    </g>

    <!-- floating particles -->
    <g aria-hidden="true">
        <circle cx="300" cy="120" r="3" class="fc-particle" />
        <circle cx="590" cy="170" r="2.5" class="fc-particle" />
        <circle cx="280" cy="430" r="2.5" class="fc-particle" />
        <circle cx="620" cy="430" r="3" class="fc-particle" />
        <circle cx="520" cy="90" r="2" class="fc-particle" />
    </g>
</svg>
