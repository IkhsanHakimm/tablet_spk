<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('SPK') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('TABLET') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('User Profile') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'criteria') class="active " @endif>
                <a href="{{ route('pages.criteria') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Criteria') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'alternative') class="active " @endif>
                <a href="{{ route('pages.alternatives') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Alternative') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.grades') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Nilai Alternative') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'calculation') class="active " @endif>
                <a href="{{ route('pages.calculation') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Perhitungan Topsis') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'result') class="active " @endif>
                <a href="{{ route('pages.result') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Hasil Ranking') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
