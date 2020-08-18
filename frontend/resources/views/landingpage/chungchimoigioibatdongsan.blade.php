@extends('layouts.landingpage')
@section('content')
<main class="main col-xs-12 noPadding" id="main">
    <div data-elementor-type="wp-post" data-elementor-id="2821" class="elementor elementor-2821" data-elementor-settings="[]">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <?php echo html_entity_decode($landingpage->content); ?>
            </div>
        </div>
    </div>
</main>
@endsection
