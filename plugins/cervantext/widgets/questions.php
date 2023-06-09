<?php

namespace Elementor;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || die();

//Text domin: cervantext

class Questions extends Widget_Base
{
    public function get_name()
    {
        return  'questions';
    }

    public function get_title()
    {
        return esc_html__('Preguntas clave', 'cervantext');
    }

    public function get_icon()
    {
        return 'eicon-bullet-list';
    }

    public function get_categories()
    {
        return ['cervantext-widgets'];
    }

    public function get_script_depends()
    {
        return ['cervantext-questions'];
    }

    public function register_controls()
    {
        $prefix = 'questions_';
        // Content Settings
        $this->start_controls_section(
            'title_section',
            [
                'label' => __('Título', 'cervantext'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            $prefix . 'title',
            [
                'label' => __('Título', 'cervantext'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Preguntas clave', 'cervantext'),
                'label_block' => true
            ]
        );

        $this->end_controls_section();

        // Content Settings
        $this->start_controls_section(
            'questions_section',
            [
                'label' => __('Preguntas', 'cervantext'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Questions Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            $prefix . 'question_text',
            [
                'label' => __('Pregunta', 'cervantext'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Pregunta #1', 'cervantext'),
                'label_block' => true
            ]
        );

        $repeater->add_control(
            $prefix . 'response_text',
            [
                'label' => __('Respuesta', 'cervantext'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Respuesta #1', 'cervantext'),
                'label_block' => true
            ]
        );


        $this->add_control(
            $prefix . 'question_repeater',
            [
                'label' => __('Elementos de preguntas', 'cervantext'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                /*'default' => [
                    [
                        $prefix.'question_text' => __( 'Ejemplo #1', 'cervantext' ),
                    ],
                ],*/
                'title_field' => '{{{ questions_question_text }}}',
            ]
        );

        $this->end_controls_section();

        //Style tab
        $this->style_tab();
    }

    private function style_tab()
    {
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Título', 'cervantext'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_title',
            [
                'label' => __('Título', 'cervantext'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Title Color
        $this->add_control(
            'content_title_color',
            [
                'label' => __( 'Color', 'cervantext' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .questions h2' => 'color: {{VALUE}}',
                ],
                'default' => '#333',
            ]
        );

        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_title_typography',
                'label' => __( 'Fuente', 'cervantext' ),
                'selector' => '{{WRAPPER}} .questions h2',
            ]
        );
    }

    protected function render()
    {
        $prefix = 'questions_';
        $settings = $this->get_settings_for_display();
?>
        <div class="questions container max-w-6xl mx-auto px-4 mb-5">
            <h2 class="text-3xl text-gray-500 font-bold font-lato text-center mb-10" <?php echo $this->get_render_attribute_string( $prefix.'title' ); ?>><?php echo $settings[ $prefix.'title' ]; ?></h2>
            <div class="max-w-2xl mx-auto">
                <?php foreach ($settings[$prefix . 'question_repeater'] as $question) : ?>
                    <div class="py-5 px-7 mb-4 bg-white rounded-lg transition duration-300">
                        <div class="flex items-center justify-between mb-4 cursor-pointer btn-toggle-question">
                            <p class="text-md md:text-lg font-bold font-lato text-gray-500"><?php esc_attr_e($question[$prefix . 'question_text']); ?></p>
                            <i class="fa-solid fa-plus text-xl text-gray-500 transform transition duration-300 ease-in-out"></i>
                        </div>
                        <div class="hidden response-content">
                            <p class="text-base font-lato text-gray-300">
                                <?php esc_attr_e($question[$prefix . 'response_text']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    }

    protected function content_template()
    {
    }
}

Plugin::instance()->widgets_manager->register(new Questions());
