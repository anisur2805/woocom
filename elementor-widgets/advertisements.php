<?php

namespace CEW\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Advertisements extends Widget_Base {

    public function get_name() {
        return 'advertisement';
    }

    public function get_title() {
        return 'Advertisement';
    }

    public function get_icon() {
        return 'fas fa-camera';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Settings',
            ]
        );

        $this->add_control(
            'label_heading',
            [
                'label'           => 'Label Heading',
                'type'              => Controls_Manager::TEXT,
                'default'           => 'My Title',
            ]
        );

        $this->add_control(
            'content_heading',
            [
                'label'           => 'content Heading',
                'type'              => Controls_Manager::TEXT,
                'default'           => 'My Content Heading',
            ]
        );

        $this->add_control(
            'content',
            [
                'label'           => 'content',
                'type'              => Controls_Manager::WYSIWYG,
                'default'           => 'Some example content. Start Editing Here.'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('label_heading', 'basic');
        $this->add_render_attribute(
            'label_heading',
            [
                'class' => ['advertisement__label-heading'],
            ]
        );

?>

        <div class="advertisement">
            <div <?php echo $this->get_render_attribute_string('label_heading'); ?>>
                <?php echo $settings['label_heading']; ?>
            </div>
            <div class="advertisement__content">
                <div class="advertisement__content__heading" <?php echo $this->get_render_attribute_string('content_heading'); ?>>
                    <?php echo $settings['content_heading']; ?>
                </div>
                <div class="advertisement__content__copy" <?php echo $this->get_render_attribute_string('content'); ?>>
                    <?php echo $settings['content']; ?>
                </div>
            </div>
        </div>
<?php
    }
}


?>

<style>
    .advertisement {
        background: #f6ebde;
    }
    .advertisement__label-heading {
        padding: .5rem 1.25rem;
        background-color: #03657f;
        color: #fff;
        width: 100%;
        font-weight: 800;
        font-size: 1.5rem;
        border-top-left-radius: .75rem;
        border-top-right-radius: .75rem;
    }

    .advertisement__content__heading {
        font-weight: 500;
        font-size: 2.5rem;
        margin-bottom: 1.25rem;
    }

    .advertisement__content {
        padding: 1rem;
        background-color: #f6ebde;
        color: #6d6d6d;
        font-size: 2rem;
    }
</style>

<?php