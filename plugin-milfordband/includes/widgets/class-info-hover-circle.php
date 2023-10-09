<?php

class MilfordBand_Info_Hover_Circle_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'milfordband_hover_circle';
    }
    public function get_title() {
        return __('Info Hover Circle', 'plugin-milfordband');
    }
    public function get_icon() {
        return 'eicon-info-circle-o';
    }
    public function get_keywords() {
        return ['info', 'milfordband', 'card'];
    }
    public function get_categories() {
        return ['milfordband-category'];
    }
    public function _register_controls() {
        $this->start_controls_section(
            'milfordband_hover_circle',
            [
                'label' => __('Info Hover Circle', 'plugin-milfordband'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'info_title_text',
            [
                'label' => __('Title', 'plugin-milfordband'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Enter your title here', 'plugin-milfordband'),
                'default' => __('Enter your title here', 'plugin-milfordband'),
            ]
        );
        $this->add_control(
            'info_desc',
            [
                'label' => __('Description', 'plugin-milfordband'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Enter your description here', 'plugin-milfordband'),
                'default' => __('Enter your description here.', 'plugin-milfordband'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __('Link', 'plugin-milfordband'),
                'label_block' => true,
                'placeholder' => __('Paste or type URL', 'plugin-milfordband'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );
        $this->add_control(
            'card_image',
            [
                'label' => __('Choose Image', 'plugin-milfordband'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Hover Overlay', 'plugin-milfordband'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .overlay',
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

		echo '<div class="circle-card">';
        echo '<a href="' . $settings['link']['url'] . '" ' . $target . $nofollow . '>';
        echo '<div class="overlay">';
        echo '<h4>' . $settings['info_title_text'] . '</h4>';
        echo '<p>' . $settings['info_desc'] . '</p>';
        echo '</div>';
        echo '</a>';
        echo '<div class="icon-image"><img src="' . $settings['card_image']['url'] . '"></div>';
        echo '</div>';
	}
}
