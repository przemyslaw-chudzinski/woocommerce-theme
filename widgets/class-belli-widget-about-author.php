<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Belli_Widget_About_Author extends WP_Widget
{

    public $id_base;
    public $name;
    public $widget_options;
    public $control_options;

    public function __construct()
    {
        $this->id_base = 'belli-widget-about-author';
        $this->name = 'Belli about author in blog sidebar';
        $this->widget_options = [];
        $this->control_options = [];
        parent::__construct($this->id_base, $this->name, $this->widget_options, $this->control_options);
    }

    public function widget($args, $instance)
    {
        $this->before($args, $instance);
        ?>
        <div class="about-widget-box">
            <header>
                <h4><a href="#">Eon Dean</a></h4>
                <h5>Front-End Developer </h5>
            </header>
            <figure>
                <img src="<?= ASSETS_PATH ?>/images/blog/eon.jpg" alt="Ean Dean">
            </figure>
            <div class="about-widget-content">
                <p>Hello! I am Eon, 26 years old front-end developer who also loves wordpress. I make awesome templates and themes.</p>
            </div><!-- End .about-widget-content -->
            <div class="social-icons">
                <a href="#" class="social-icon icon-facebook" title="Facebook">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="social-icon icon-twitter" title="Twitter">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="social-icon icon-dribbble" title="Dribbble">
                    <i class="fa fa-dribbble"></i>
                </a>
                <a href="#" class="social-icon icon-skype" title="Skype">
                    <i class="fa fa-skype"></i>
                </a>
                <a href="#" class="social-icon icon-linkedin" title="Linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div><!-- End .social-icons -->
        </div><!-- End .about-widget-box -->
        <?php
        $this->after($args, $instance);
    }

    protected function before($args, $instance)
    {
        ?>
        <?= isset($args['before_widget']) && !empty($args['before_widget']) ? $args['before_widget'] : '<div>' ?>
        <?php
    }

    protected function after($args, $instance)
    {
        ?>
        <?= isset($args['after_widget']) && !empty($args['after_widget']) ? $args['after_widget'] : '</div>' ?>
        <?php
    }

    protected function get_tag_link($tag_id)
    {
        return get_tag_link($tag_id);
    }

    public function form($instance)
    {
        ?>
        brak formularza
        <?php
    }
}