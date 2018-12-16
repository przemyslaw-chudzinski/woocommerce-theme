<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Belli_Widget_Tag_Cloud extends WP_Widget
{

    public $id_base;
    public $name;
    public $widget_options;
    public $control_options;

    public function __construct()
    {
        $this->id_base = 'belli-widget-tag-cloud';
        $this->name = 'Belli tag cloud in blog sidebar';
        $this->widget_options = [];
        $this->control_options = [];
        parent::__construct($this->id_base, $this->name, $this->widget_options, $this->control_options);
    }

    public function widget($args, $instance)
    {
        $tags = get_tags();
        $this->before($args, $instance);
        ?>
        <?php if(count($tags) > 0): ?>
        <div class="tagcloud clearfix">
            <?php foreach ($tags as $tag): ?>
                <a href="<?= $this->get_tag_link($tag->term_id) ?>"><?= $tag->name; ?></a>
            <?php endforeach; ?>
        </div><!-- End .tagcloud -->
        <?php endif; ?>
        <?php
        $this->after($args, $instance);
    }

    protected function before($args, $instance)
    {
        ?>
        <?= isset($args['before_widget']) && !empty($args['before_widget']) ? $args['before_widget'] : '<div>' ?>
        <?= isset($args['before_title']) && !empty($args['before_title']) ? $args['before_title'] : '<h3>' ?>
        <?= isset($instance['widget_title']) && !empty($instance['widget_title']) ? $instance['widget_title'] : 'Tag Cloud' ?>
        <?= isset($args['after_title']) && !empty($args['after_title']) ? $args['after_title'] : '</h3>' ?>
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
        <label>Title</label>
        <input
                type="text"
                name="<?= $this->get_field_name('widget_title'); ?>"
                class="widefat"
                value="<?= $instance['widget_title'] ?>">
        <?php
    }
}