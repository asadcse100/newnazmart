<?php

namespace Plugins\WidgetBuilder\Widgets;


use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Models\Language;
use App\Models\Widgets;
use Modules\Blog\Entities\BlogCategory;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\WidgetBase;
use Mews\Purifier\Facades\Purifier;
use App\Helpers\SanitizeInput;

class AboutUsWidget extends WidgetBase
{
    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

            $output .= Text::get([
                'name' => 'logo_text',
                'label' => __('Logo Text'),
                'value' => $widget_saved_values['logo_text'] ?? null
            ]);

            $output .= Textarea::get([
                'name' => 'description',
                'label' => __('Description'),
                'value' => $widget_saved_values['description'] ?? null
            ]);


        $output .= Image::get([
            'name' => 'logo_image',
            'label' => __('Logo'),
            'value' => $widget_saved_values['logo_image'] ?? null
        ]);

        $output .= Select::get([
            'name' => 'logo_style',
            'label' => __('Logo Style'),
            'options' => [
                'text' => __('Text'),
                'logo' => __('Logo'),
            ],
            'value' => $widget_saved_values['logo_style'] ?? null,
            'info' => __('You can set logo or text from here')
        ]);


        //repeater
        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'footer_social_about_media',
            'fields' => [
                [
                    'type' => RepeaterField::ICON_PICKER,
                    'name' => 'repeater_icon',
                    'label' => __('Icon')
                ],

                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_icon_url',
                    'label' => __('Icon URL')
                ],
            ]
        ]);


        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }


    public function enable(): bool
    {
        return is_null(tenant()); // TODO: Change the autogenerated stub
    }

    public function frontend_render()
    {
        $widget_saved_values = $this->get_settings();
        $description = SanitizeInput::esc_html($widget_saved_values['description']) ?? '';
        $root_url = url('/');
        $logo_text = SanitizeInput::esc_html($widget_saved_values['logo_text']) ?? '';
        $logo_style = $widget_saved_values['logo_style'] ?? '';
        $logo = render_image_markup_by_attachment_id($widget_saved_values['logo_image'] ) ?? null;

        $logo_text_condition = $logo_style == 'text' ? '<h2>'.$logo_text.'</h2>' : $logo;


        $repeater_data = $widget_saved_values['footer_social_about_media'] ?? [];

   $repeater_markup = '';
    foreach ($repeater_data['repeater_icon_url_'] as $key => $url){
        $icon_url = $url ?? '';
        $icon = $repeater_data['repeater_icon_'][$key] ?? '';

$repeater_markup.= <<<SOCIALITEM
    <li class="lists">
        <a class="facebook" href="{$icon_url}"> <i class="{$icon}"></i> </a>
    </li>
SOCIALITEM;

}

return <<<HTML
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="footer-widget">
            <div class="about_us_widget">
                <a href="{$root_url}" class="footer-logo">
                        {$logo_text_condition}
                </a>
            </div>
            <div class="footer-inner">
                <p class="footer-para">{$description}</p>
                <div class="footer-socials">
                    <ul class="footer-social-list">
                        {$repeater_markup}
                    </ul>
                </div>
            </div>
        </div>
    </div>
HTML;
}

    public function widget_title(){
        return __('Theme 1: About Us (01)');
    }

}