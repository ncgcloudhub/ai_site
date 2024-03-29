<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8" />
        <title>TrionxAI</title>

        <!-- mobile responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
        />

        <!-- ** Plugins Needed for the Project ** -->
        <!-- Bootstrap -->
        <link
            rel="stylesheet"
            href="/frontend/plugins/bootstrap/bootstrap.min.css"
        />
        <!-- themefy-icon -->
        <link
            rel="stylesheet"
            href="/frontend/plugins/themify-icons/themify-icons.css"
        />
        <!-- slick slider -->
        <link rel="stylesheet" href="/frontend/plugins/slick/slick.css" />
        <!-- venobox popup -->
        <link rel="stylesheet" href="/frontend/plugins/Venobox/venobox.css" />
        <!-- aos -->
        <link rel="stylesheet" href="/frontend/plugins/aos/aos.css" />

        <!-- Main Stylesheet -->
        <link href="/frontend/css/style.css" rel="stylesheet" />

        <!--Favicon-->
        <link
            rel="shortcut icon"
            href="/frontend/images/favicon.ico"
            type="image/x-icon"
        />
        <link
            rel="icon"
            href="/frontend/images/favicon.ico"
            type="image/x-icon"
        />
    </head>

    <body>
        <!-- navigation -->
        <section class="fixed-top navigation">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"
                        ><img src="/frontend/images/logo1.png" alt="logo"
                    /></a>
                    <button
                        class="navbar-toggler border-0"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbar"
                        aria-controls="navbar"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- navbar -->
                    <div
                        class="collapse navbar-collapse text-center"
                        id="navbar"
                    >
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#feature"
                                    >Feature</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="service.html"
                                    >Service</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#team"
                                    >Team</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#pricing"
                                    >Pricing</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html"
                                    >Contact</a
                                >
                            </li>
                        </ul>
                        <a
                            href="/login"
                            class="btn btn-primary ml-lg-3 primary-shadow"
                            >Login</a
                        >
                    </div>
                </nav>
            </div>
        </section>
        <!-- /navigation -->

        <!-- hero area -->
        <section
            class="hero-section hero"
            data-background=""
            style="
                background-image: url(/frontend/images/hero-area/banner-bg.png);
            "
        >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center zindex-1">
                        <h1 class="mb-3">
                           Explore deep into AI<br />
                          With us
                        </h1>
                        <p class="mb-4">
                            Elevate your business with state-of-the-art AI <br />
                            services tailored to your unique needs
                        </p>
                        <a href="#" class="btn btn-secondary btn-lg"
                            >explore us</a
                        >
                        <!-- banner image -->
                        <img
                            class="img-fluid w-100 banner-image"
                            src="/frontend/images/hero-area/banner-img1.png"
                            alt="banner-img"
                        />
                    </div>
                </div>
            </div>
            <!-- background shapes -->
            <div id="scene">
                <img
                    class="img-fluid hero-bg-1 up-down-animation"
                    src="/frontend/images/background-shape/feature-bg-2.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-2 left-right-animation"
                    src="/frontend/images/background-shape/seo-ball-1.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-3 left-right-animation"
                    src="/frontend/images/background-shape/seo-half-cycle.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-4 up-down-animation"
                    src="/frontend/images/background-shape/green-dot.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-5 left-right-animation"
                    src="/frontend/images/background-shape/blue-half-cycle.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-6 up-down-animation"
                    src="/frontend/images/background-shape/seo-ball-1.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-7 left-right-animation"
                    src="/frontend/images/background-shape/yellow-triangle.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-8 up-down-animation"
                    src="/frontend/images/background-shape/service-half-cycle.png"
                    alt=""
                />
                <img
                    class="img-fluid hero-bg-9 up-down-animation"
                    src="/frontend/images/background-shape/team-bg-triangle.png"
                    alt=""
                />
            </div>
        </section>
        <!-- /hero-area -->

        <!-- feature -->
        <section class="section feature mb-0" id="feature">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-title">Awesome Features</h2>
                        <p class="mb-100">
                            Elevate Your Digital Presence with Intelligent Solutions - Unleashing AI Chatbots, <br />Multimedia Transformation, and Dynamic Content Generation
                        </p>
                    </div>
                    <!-- feature item -->
                    <div class="col-md-6 mb-80">
                        <div class="d-flex feature-item">
                            <div>
                                <i
                                    class="ti-ruler-pencil feature-icon mr-4"
                                ></i>
                            </div>
                            <div>
                                <h4>AI Chatbot Integration</h4>
                                <p>
                                    Engage and assist your website visitors with TrionxAI's advanced AI chatbot, providing seamless communication and support.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="col-md-6 mb-80">
                        <div class="d-flex feature-item">
                            <div>
                                <i
                                    class="ti-layout-cta-left feature-icon mr-4"
                                ></i>
                            </div>
                            <div>
                                <h4>Text to Image Conversion</h4>
                                <p>
                                    Transform textual content into captivating visuals effortlessly, as TrionxAI converts text to images, enhancing the visual appeal and accessibility of your information.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="col-md-6 mb-80">
                        <div class="d-flex feature-item">
                            <div>
                                <i class="ti-split-v-alt feature-icon mr-4"></i>
                            </div>
                            <div>
                                <h4>Text to Speech Functionality</h4>
                                <p>
                                    Elevate user experience by converting written content into natural and expressive speech, with TrionxAI's text-to-speech feature, ensuring accessibility and convenience.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="col-md-6 mb-80">
                        <div class="d-flex feature-item">
                            <div>
                                <i class="ti-layers-alt feature-icon mr-4"></i>
                            </div>
                            <div>
                                <h4>AI Article Generation</h4>
                                <p>
                                    Streamline content creation with TrionxAI's AI article generation, harnessing the power of artificial intelligence to produce high-quality, relevant, and tailored articles for your website or business needs.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img
                class="feature-bg-1 up-down-animation"
                src="/frontend/images/background-shape/feature-bg-1.png"
                alt="bg-shape"
            />
            <img
                class="feature-bg-2 left-right-animation"
                src="/frontend/images/background-shape/feature-bg-2.png"
                alt="bg-shape"
            />
        </section>
        <!-- /feature -->

        <!-- marketing -->
        <section class="section-lg seo">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="seo-image">
                            <img
                                class="img-fluid"
                                src="/frontend/images/marketing/marketing1.png"
                                alt="form-img"
                            />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h2 class="section-title">
                            Streamlined Creativity with Effortless Content Creation Templates
                        </h2>
                        <p>
                            Revolutionize your content creation process effortlessly with TrionxAI's user-friendly template system. Our ready-made templates streamline the content generation journey, ensuring efficiency and consistency. <br> Empower your creativity without the hassle, and watch your ideas come to life seamlessly.
                        </p>
                    </div>
                </div>
            </div>
            <!-- background image -->
            <img
                class="img-fluid seo-bg"
                src="/frontend/images/backgrounds/seo-bg.png"
                alt="seo-bg"
            />
            <!-- background-shape -->
            <img
                class="seo-bg-shape-1 left-right-animation"
                src="/frontend/images/background-shape/seo-ball-1.png"
                alt="bg-shape"
            />
            <img
                class="seo-bg-shape-2 up-down-animation"
                src="/frontend/images/background-shape/seo-half-cycle.png"
                alt="bg-shape"
            />
            <img
                class="seo-bg-shape-3 left-right-animation"
                src="/frontend/images/background-shape/seo-ball-2.png"
                alt="bg-shape"
            />
        </section>
        <!-- /marketing -->

        <!-- service -->
        <section class="section-lg service">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-5 order-2 order-md-1">
                        <h2 class="section-title">
                            Elevate Coding Excellence with Dynamic Generation Templates
                        </h2>
                        <p class="mb-4">
                            TrionxAI's code generation templates redefine programming simplicity, enabling developers to effortlessly craft robust solutions. The templates offer precision, adaptability, and efficiency, ensuring consistent and innovative code across diverse projects.
                        </p>
                        <ul class="pl-0 service-list">
                            <li>
                                <i class="ti-layout-tab-window text-purple"></i
                                >Precision
                            </li>
                            <li>
                                <i class="ti-layout-placeholder text-purple"></i
                                >Efficiency
                            </li>
                            <li>
                                <i class="ti-support text-purple"></i>Simplicity
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 order-1 order-md-2">
                        <img
                            class="img-fluid layer-3"
                            src="/frontend/images/service/service1.png"
                            alt="service"
                        />
                    </div>
                </div>
            </div>
            <!-- background image -->
            <img
                class="img-fluid service-bg"
                src="/frontend/images/backgrounds/service-bg.png"
                alt="service-bg"
            />
            <!-- background shapes -->
            <img
                class="service-bg-shape-1 up-down-animation"
                src="/frontend/images/background-shape/service-half-cycle.png"
                alt="background-shape"
            />
            <img
                class="service-bg-shape-2 left-right-animation"
                src="/frontend/images/background-shape/feature-bg-2.png"
                alt="background-shape"
            />
        </section>
        <!-- /service -->

        <!-- team -->
        <section class="section-lg team" id="team">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-title">Our Team</h2>
                        <p class="mb-100">
                            Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu<br />
                            fugiat nulla pariatur. Excepteur sint occaecat
                        </p>
                    </div>
                </div>
                <div class="col-10 mx-auto">
                    <div class="team-slider">
                        <!-- team-member -->
                        <div class="team-member">
                            <div class="d-flex mb-4">
                                <div class="mr-3">
                                    <img
                                        class="rounded-circle img-fluid"
                                        src="/frontend/images/team/team-1.jpg"
                                        alt="team-member"
                                    />
                                </div>
                                <div class="align-self-center">
                                    <h4>Becroft</h4>
                                    <h6 class="text-color">web designer</h6>
                                </div>
                            </div>
                            <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia and Consonantia,
                                there live the blind texts. S eparated they
                            </p>
                        </div>
                        <!-- team-member -->
                        <div class="team-member">
                            <div class="d-flex mb-4">
                                <div class="mr-3">
                                    <img
                                        class="rounded-circle img-fluid"
                                        src="/frontend/images/team/team-2.jpg"
                                        alt="team-member"
                                    />
                                </div>
                                <div class="align-self-center">
                                    <h4>John Doe</h4>
                                    <h6 class="text-color">web developer</h6>
                                </div>
                            </div>
                            <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia and Consonantia,
                                there live the blind texts. S eparated they
                            </p>
                        </div>
                        <!-- team-member -->
                        <div class="team-member">
                            <div class="d-flex mb-4">
                                <div class="mr-3">
                                    <img
                                        class="rounded-circle img-fluid"
                                        src="/frontend/images/team/team-3.jpg"
                                        alt="team-member"
                                    />
                                </div>
                                <div class="align-self-center">
                                    <h4>Erik Ligas</h4>
                                    <h6 class="text-color">Programmer</h6>
                                </div>
                            </div>
                            <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia and Consonantia,
                                there live the blind texts. S eparated they
                            </p>
                        </div>
                        <!-- team-member -->
                        <div class="team-member">
                            <div class="d-flex mb-4">
                                <div class="mr-3">
                                    <img
                                        class="rounded-circle img-fluid"
                                        src="/frontend/images/team/team-1.jpg"
                                        alt="team-member"
                                    />
                                </div>
                                <div class="align-self-center">
                                    <h4>Erik Ligas</h4>
                                    <h6 class="text-color">Programmer</h6>
                                </div>
                            </div>
                            <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia and Consonantia,
                                there live the blind texts. S eparated they
                            </p>
                        </div>
                        <!-- team-member -->
                        <div class="team-member">
                            <div class="d-flex mb-4">
                                <div class="mr-3">
                                    <img
                                        class="rounded-circle img-fluid"
                                        src="/frontend/images/team/team-2.jpg"
                                        alt="team-member"
                                    />
                                </div>
                                <div class="align-self-center">
                                    <h4>John Doe</h4>
                                    <h6 class="text-color">web developer</h6>
                                </div>
                            </div>
                            <p>
                                Far far away, behind the word mountains, far
                                from the countries Vokalia and Consonantia,
                                there live the blind texts. S eparated they
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- backgound image -->
            <img
                src="/frontend/images/backgrounds/team-bg.png"
                alt="team-bg"
                class="img-fluid team-bg"
            />
            <!-- background shapes -->
            <img
                class="team-bg-shape-1 up-down-animation"
                src="/frontend/images/background-shape/seo-ball-1.png"
                alt="background-shape"
            />
            <img
                class="team-bg-shape-2 left-right-animation"
                src="/frontend/images/background-shape/seo-ball-1.png"
                alt="background-shape"
            />
            <img
                class="team-bg-shape-3 left-right-animation"
                src="/frontend/images/background-shape/team-bg-triangle.png"
                alt="background-shape"
            />
            <img
                class="team-bg-shape-4 up-down-animation img-fluid"
                src="/frontend/images/background-shape/team-bg-dots.png"
                alt="background-shape"
            />
        </section>
        <!-- /team -->

        <!-- pricing -->
        <section class="section-lg pb-0 pricing" id="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-title">Our Pricing</h2>
                        <p class="mb-50">
                            Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu <br />
                            fugiat nulla pariatur. Excepteur sint occaecat
                        </p>
                    </div>
                    <div class="col-lg-10 mx-auto">
                        <div class="row justify-content-center">
                            <!-- pricing table -->
                            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                                <div
                                    class="rounded text-center pricing-table table-1"
                                >
                                    <h3>Free</h3>
                                    <h1><span>$</span>00</h1>
                                    <p>
                                        Far far away, behind the wordmountains,
                                        far from the countries Vokalia and
                                    </p>
                                    <a href="#" class="btn pricing-btn px-2"
                                        >Get Started</a
                                    >
                                </div>
                            </div>
                            <!-- pricing table -->
                            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                                <div
                                    class="rounded text-center pricing-table table-2"
                                >
                                    <h3>Standard</h3>
                                    <h1><span>$</span>75</h1>
                                    <p>
                                        Far far away, behind the wordmountains,
                                        far from the countries Vokalia and
                                    </p>
                                    <a href="#" class="btn pricing-btn px-2"
                                        >Buy Now</a
                                    >
                                </div>
                            </div>
                            <!-- pricing table -->
                            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                                <div
                                    class="rounded text-center pricing-table table-3"
                                >
                                    <h3>Premium</h3>
                                    <h1><span>$</span>99</h1>
                                    <p>
                                        Far far away, behind the wordmountains,
                                        far from the countries Vokalia and
                                    </p>
                                    <a href="#" class="btn pricing-btn px-2"
                                        >Buy Now</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- background shapes -->
            <img
                class="pricing-bg-shape-1 up-down-animation"
                src="/frontend/images/background-shape/seo-ball-1.png"
                alt="background-shape"
            />
            <img
                class="pricing-bg-shape-2 up-down-animation"
                src="/frontend/images/background-shape/seo-half-cycle.png"
                alt="background-shape"
            />
            <img
                class="pricing-bg-shape-3 left-right-animation"
                src="/frontend/images/background-shape/team-bg-triangle.png"
                alt="background-shape"
            />
        </section>
        <!-- /pricing -->

        <!-- client logo slider -->
        <section class="section">
            <div class="container">
                <div class="client-logo-slider align-self-center">
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-1.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-2.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-3.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-4.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-5.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-1.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-2.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-3.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-4.png"
                            alt="client-logo"
                    /></a>
                    <a href="#" class="text-center d-block outline-0 p-5"
                        ><img
                            class="d-unset img-fluid"
                            src="/frontend/images/clients-logo/client-logo-5.png"
                            alt="client-logo"
                    /></a>
                </div>
            </div>
        </section>
        <!-- /client logo slider -->

        <!-- newsletter -->
        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Receive updates, news and deals</p>
                    </div>
                    <div class="col-lg-8 col-sm-10 col-12 mx-auto">
                        <form action="#">
                            <div class="input-wrapper position-relative">
                                <input
                                    type="email"
                                    class="newsletter-form"
                                    id="newsletter"
                                    placeholder="Enter your email"
                                />
                                <button
                                    type="submit"
                                    value="send"
                                    class="btn newsletter-btn"
                                >
                                    subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- background shapes -->
            <img
                class="newsletter-bg-shape left-right-animation"
                src="/frontend/images/background-shape/seo-ball-2.png"
                alt="background-shape"
            />
        </section>
        <!-- /newsletter -->

        <!-- footer -->
        <footer
            class="footer-section footer"
            style="
                background-image: url(/frontend/images/backgrounds/footer-bg.png);
            "
        >
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center text-lg-left mb-4 mb-lg-0">
                        <!-- logo -->
                        <a href="index.html">
                            <img
                                class="img-fluid"
                                src="/frontend/images/logo.png"
                                alt="logo"
                            />
                        </a>
                    </div>
                    <!-- footer menu -->
                    <nav class="col-lg-8 align-self-center mb-5">
                        <ul
                            class="list-inline text-lg-right text-center footer-menu"
                        >
                            <li class="list-inline-item active">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="page-scroll" href="#feature"
                                    >Feature</a
                                >
                            </li>
                            <li class="list-inline-item">
                                <a href="about.html">About</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="page-scroll" href="#team">Team</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="page-scroll" href="#pricing"
                                    >Pricing</a
                                >
                            </li>
                            <li class="list-inline-item">
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- footer social icon -->
                    <nav class="col-12">
                        <ul
                            class="list-inline text-lg-right text-center social-icon"
                        >
                            <li class="list-inline-item">
                                <a class="facebook" href="#"
                                    ><i class="ti-facebook"></i
                                ></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="twitter" href="#"
                                    ><i class="ti-twitter-alt"></i
                                ></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="linkedin" href="#"
                                    ><i class="ti-linkedin"></i
                                ></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="black" href="#"
                                    ><i class="ti-github"></i
                                ></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>
        <!-- /footer -->

        <!-- jQuery -->
        <script src="/frontend/plugins/jQuery/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="/frontend/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- slick slider -->
        <script src="/frontend/plugins/slick/slick.min.js"></script>
        <!-- venobox -->
        <script src="/frontend/plugins/Venobox/venobox.min.js"></script>
        <!-- aos -->
        <script src="/frontend/plugins/aos/aos.js"></script>
        <!-- Main Script -->
        <script src="/frontend/js/script.js"></script>
    </body>
</html>
