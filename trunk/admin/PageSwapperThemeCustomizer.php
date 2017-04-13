<?php

/**
 * @since 1.0.0
 * @author shennemann
 * @licence MIT
 */
class PageSwapperThemeCustomizer {
    private $sectionId;
    private $textdomain;
    private $fields;

    public function __construct() {
        $id = 'pageswapper';
        $this->textdomain = $textdomain = 'page-swapper';
        $this->sectionId = $id;

        $this->fields = array();

        $this->fields['pageswapper'] =
            array(
                'title' => 'PageSwapper',
                'fields' => array(
                    'debugmode' => array(
                        'type' => 'checkbox',
                        'label' => __( 'Debug-Mode', $textdomain ),
                    ),
                    'useOldOwl' => array(
                        'type' => 'checkbox',
                        'label' => __( 'Use old owl-carousel (v1.3)', $textdomain ),
                    ),
                    'selector' => array(
                        'type' => 'text',
                        'label' => __( 'Selector', $textdomain ),
                        'default' => 'body',
                    ),
                    'owlConfig' => array(
                        'type' => 'textarea',
                        'label' => __( 'Owl-Slider-Config', $textdomain ),
                        'description' => '<b>' . __( 'Presets', $textdomain ) . '</b>:'
                            . '<select id="owl-slider-presets" data-lang="' . get_locale() . '">
                                <option value="">Slide (' . __( 'Default', $textdomain ) . ')</option>
                                <option value="fade">Fade</option>
                                <option value="slidevertical">SlideVertical</option>
                                <option value="zoominout">Zoom In/out</option>
                                </select>',
                    ),
                    'owlDesc' => array(
                        'type' => 'hidden',
                        'label' => __( 'Description', $textdomain ),
                        'description' => __( 'You can use these options', $textdomain ) . ':<br />' .
                            '<a href="http://www.owlcarousel.owlgraphic.com/docs/api-options.html" target="_blank">
                                OwlCarousel Options
                            </a>
                            <br />' .
                            __( 'You can use these animations', $textdomain ) . ':<br />
                            <a href="http://daneden.github.io/animate.css/" target="_blank">
                                Animate.css
                            </a>
                        </div>',
                    ),

                    'disableHash' => array(
                        'type' => 'checkbox',
                        'label' => __( 'Disable hash', $textdomain ),
                    ),
                ),
            );

    }

    public function actionCustomizeRegister( $wp_customize ) {
        $prefix = 'pageswapper_';
        /*$wp_customize->add_panel( 'pageswapper-panel', array(
            'title' => __( 'PageSwapper' ),
            'section' => 'pageswapper',
        ) );*/


        foreach ( $this->fields as $sectionId => $section ) {
            $wp_customize->add_section( $sectionId, array(
                'title' => __( $section['title'], $this->textdomain ),
                #'panel' => 'pageswapper-panel',
            ) );

            foreach ( $section['fields'] as $fieldId => $field ) {
                $settingId = $prefix . ( !is_numeric( $fieldId ) ? $fieldId : $field['id'] );
                $controlId = $settingId . '-control';

                $wp_customize->add_setting( $settingId, array(
                    'default' => !empty( $field['default'] ) ? $field['default'] : '',
                    'transport' => !empty( $field['transport'] ) ? $field['transport'] : 'refresh',
                ) );

                $wp_customize->add_control( $controlId, array(
                    'label' => __( $field['label'], $this->textdomain ),
                    'section' => $sectionId,
                    'type' => !empty( $field['type'] ) ? $field['type'] : 'text',
                    'settings' => $settingId,
                    'description' => !empty( $field['description'] ) ? __( $field['description'], $this->textdomain ) : '',
                    'choices' => !empty( $field['choices'] ) ? $field['choices'] : null,
                    'input_attrs' => !empty( $field['input_attrs'] ) ? $field['input_attrs'] : null,
                ) );
            }
        }
    }
}

/*if( class_exists( 'WP_Customize_Control' ) ) {
    class WP_Customize_Headline_Control extends WP_Customize_Control {
        public $type = 'headline';

        public function render_content() {
            echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
        }
    }
}*/