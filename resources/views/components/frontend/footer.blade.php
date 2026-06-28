<footer class="position-relative w-lg-100 w-sm-full">
    <img style="opacity: 0.5" width="100%" height="100%" src="{{ asset('/public/storage/default/footer-bg.png') }}"
        alt="Footer Bg" />
    <div class="container-box position-absolute">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12 col-12 text-md-center">
                <img class="img-fluid"
                 
                    src="{{ $setting->flogo ?? asset('/public/storage/default/footer-logo.png') }}"
                    alt="Fotter Logo" />
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12 col-12 m-md-auto">
                <div class="footer-boxss d-flex mt-md-5 w-lg-100">
                    <div>
                        <h3>মসজিদের অবস্থান</h3>
                        <p>{{ isset($setting) ? $setting->address : '' }}
                        </p>
                        <div class="email-box">
                            <p>
                                <span>ইমেইল: </span>
                                {{ isset($setting) ? $setting->email : 'info@jagoron.org' }}

                            </p>
                            <p><span>সভাপতি : </span> {{ isset($setting) ? $setting->phone : '' }}</p>
                            <p><span>সেক্রেটারি:  </span>{{ isset($setting) ? $setting->tnt : '' }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column link-section ">
                        <h3>Links</h3>
                        @forelse ($menus as $menu)
                            @if ($menu->place == 'footer')
                                <a style="font-size: 15px"
                                    href="{{ $menu->route_type === 'page' ? route('page.show', $menu->page->slug) : url($menu->route) }}">{{ $menu->name }}</a>
                            @endif
                        @empty
                        @endforelse
                    </div>

                    <div class="social_link ">
                        <h3>Socials</h3>

                        @php
                            $socialLinks = json_decode($setting->social_links ?? '{}', true);
                        @endphp

                        @forelse ($socialLinks as $key => $value)
                            @if (!empty($value))
                                <a style="text-decoration: none" title="{{ ucfirst($key) }}" href="{{ $value }}"
                                    target="_blank">
                                    <i class="bi bi-{{ $key }} fs-5 text-white"></i>
                                </a>
                            @endif
                        @empty
                            <p>No available social links</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        <p>{{ isset($setting) ? $setting->copyright : ' ' }}
        </p>
    </div>
</footer>
