<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Belli_Widget_Blog_Categories extends WP_Widget
{

    public $id_base;
    public $name;
    public $widget_options;
    public $control_options;

    public function __construct()
    {
        $this->id_base = 'belli-widget-blog-categories';
        $this->name = 'Belli blog categories in blog sidebar';
        $this->widget_options = [];
        $this->control_options = [];
        parent::__construct($this->id_base, $this->name, $this->widget_options, $this->control_options);
    }

    public function widget($args, $instance)
    {
        $categories = get_categories();
        $this->before($args, $instance);
        ?>
            <?php if(count($categories) > 0): ?>
                <ul class="links">
                    <?php foreach ($categories as $category): ?>
                        <li><a href="<?= $this->get_category_link($category->term_id) ?>"><i class="fa fa-angle-right"></i><?= $category->name; ?> (<?= $category->category_count; ?>)</a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php
        $this->after($args, $instance);
    }

    protected function before($args, $instance)
    {
        ?>
        <?= isset($args['before_widget']) && !empty($args['before_widget']) ? $args['before_widget'] : '<div>' ?>
        <?= isset($args['before_title']) && !empty($args['before_title']) ? $args['before_title'] : '<h3>' ?>
        <?= isset($instance['widget_title']) && !empty($instance['widget_title']) ? $instance['widget_title'] : 'Categories' ?>
        <?= isset($args['after_title']) && !empty($args['after_title']) ? $args['after_title'] : '</h3>' ?>
        <?php
    }

    protected function after($args, $instance)
    {
        ?>
        <?= isset($args['after_widget']) && !empty($args['after_widget']) ? $args['after_widget'] : '</div>' ?>
        <?php
    }

    protected function get_category_link($category_id)
    {
        return get_category_link($category_id);
    }

    public function form($instance)
    {
        ?>
        <label>Title</label>
        <input
                type="text"
                name="<?= $this->get_field_name('widget_title'); ?>"
                class="widefat"
                value="<?= $instance['widget_title'] ?>">
        <?php
    }
}