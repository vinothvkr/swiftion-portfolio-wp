<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header-content-left">
                            <h4>Hello I'm</h4>
                            <h1><?php echo get_theme_mod('frontpage_header_primary_title'); ?></h1>
                            <h2><?php echo get_theme_mod('frontpage_header_secondary_title'); ?></h2>
                            <div class="typewriter" id="typewriter">
                                <span class="type"></span>
                                <span class="cursor">_</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <div class="header-content-right">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>About</h2>
                    <div class="section-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Pellentesque habitant morbi tristique senectus et. Proin fermentum leo vel orci porta non pulvinar neque. Tellus molestie nunc non blandit massa. Viverra mauris in aliquam sem. Ac turpis egestas integer eget aliquet nibh. Felis imperdiet proin fermentum leo vel orci porta non pulvinar. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ultrices sagittis orci a scelerisque purus semper eget duis. Sed enim ut sem viverra aliquet eget sit amet. Sed viverra tellus in hac habitasse platea dictumst. Facilisis mauris sit amet massa vitae. Nec feugiat nisl pretium fusce. Iaculis eu non diam phasellus vestibulum lorem. Tristique senectus et netus et malesuada fames.
                        </p>
                        <p>
                            Ipsum dolor sit amet consectetur adipiscing. Quis hendrerit dolor magna eget. Maecenas accumsan lacus vel facilisis volutpat est. Ullamcorper dignissim cras tincidunt lobortis feugiat. Neque aliquam vestibulum morbi blandit cursus. In massa tempor nec feugiat nisl pretium fusce. Auctor neque vitae tempus quam. Enim eu turpis egestas pretium aenean. Est lorem ipsum dolor sit amet consectetur adipiscing elit. Vitae turpis massa sed elementum tempus egestas. Neque convallis a cras semper auctor neque. Semper auctor neque vitae tempus quam pellentesque. Pharetra magna ac placerat vestibulum. Velit euismod in pellentesque massa placerat duis ultricies lacus. Bibendum arcu vitae elementum curabitur vitae nunc sed velit dignissim. Lorem ipsum dolor sit amet consectetur adipiscing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Service</h2>
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="icon">
                                        <i class="fas fa-columns"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Web Development</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="icon">
                                        <i class="fas fa-paint-brush"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Web Design</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="icon">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Software Development</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="icon">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Deployment</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact</h2>
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="contact-form">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control form-control-lg" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248756.1167537794!2d80.06892521258872!3d13.047487786031711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265ea4f7d3361%3A0x6e61a70b6863d433!2sChennai%2C+Tamil+Nadu!5e0!3m2!1sen!2sin!4v1562860543908!5m2!1sen!2sin" width="570" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();