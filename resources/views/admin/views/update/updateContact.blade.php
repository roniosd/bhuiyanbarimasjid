<x-app-layout title="Add Parmition">
    <div class="content-area pb-0">
        <form action="orgContactUpdate" method="POST" class="row theme-form">
            @csrf

            <div>
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>Update Contact Info</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                        </div>

                        <div class="custom-card-body">
                            <div class="row">
                                {{-- Address --}}
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Address<sup>*</sup></label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Enter address"
                                            value="{{ old('address', $contact->address ?? '') }}">
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter email" value="{{ old('email', $contact->email ?? '') }}">
                                    </div>
                                </div>

                                {{-- TNT --}}
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">TNT (Landline)</label>
                                        <input type="text" name="tnt" class="form-control"
                                            placeholder="Enter TNT" value="{{ old('tnt', $contact->tnt ?? '') }}">
                                    </div>
                                </div>

                                {{-- Mobile --}}
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Mobile</label>
                                        <input type="text" name="mobile" class="form-control"
                                            placeholder="Enter mobile number"
                                            value="{{ old('mobile', $contact->mobile ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Mobile --}}
                            <div class="col-lg-12">
                                <div class="form-group custom-form-group">
                                    <label for="">Map</label>
                                    <input type="url" name="map" class="form-control"
                                        placeholder="Enter a map url" value="{{ old('map', $contact->map ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn theme-btn">
                            <i class="bi bi-plus-circle-dotted me-3"></i>
                            Update Contact
                        </button>

                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
</x-app-layout>
