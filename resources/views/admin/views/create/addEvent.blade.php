<x-app-layout title="Add Event">
    <div class="content-area">
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card ">
                        <div class="custom-card-header ">

                            <div class="heading">
                                <h1>Add Event</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{ route('event.index') }}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Title <sup>*</sup> </label>
                                        <input type="text" id="Title" name="title" value="{{ old('title') }}"
                                            class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug <sup>*</sup></label>
                                        <input type="text" name="slug" id="unique_url" value="{{ old('slug') }}"
                                            class="form-control" placeholder="Enter slug">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Tagline or Slogan</label>
                                        <input type="text" name="slogan" value="{{ old('slogan') }}"
                                            class="form-control" placeholder="Tagline or slogan">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Location or Venue(in Bangla) <sup>*</sup></label>
                                        <input type="text" name="venue" value="{{ old('venue') }}"
                                            class="form-control" placeholder="Location or Venue name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Latitude</label>
                                        <input type="text" name="latitude" value="{{ old('latitude') }}"
                                            class="form-control" placeholder="Latitude on Google map">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Longitude</label>
                                        <input type="text" name="longitude" value="{{ old('longitude') }}"
                                            class="form-control" placeholder="Longitude on Google map">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Map Zoom Factor</label>
                                        <input type="text" name="zoom" value="{{ old('zoom') }}"
                                            class="form-control" placeholder="Google map zoom factor">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Map Height</label>
                                        <input type="text" name="height" value="{{ old('height') }}"
                                            class="form-control" placeholder="Google map height">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Map Width</label>
                                        <input type="text" name="width" value="{{ old('width') }}"
                                            class="form-control" placeholder="Google map width">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">City</label>
                                        <input type="text" name="city" value="{{ old('city') }}"
                                            class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control lh-lg" style="resize: none;" placeholder="Write a short descriptions"
                                            name="short_description" rows="2">{{ old('short_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group custom-form-group">
                                <textarea placeholder="Event descriptions" name="description" id="editor">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="form-group custom-form-group">
                                <label for="start_date" class="form-label">Start Date<sup>*</sup></label>
                                <input type="date" name="start_date" id="start_date"
                                    value="{{ old('start_date') }}" class="form-control"
                                    placeholder="Select Start date">
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="end_date" class="form-label">End Date<sup>*</sup></label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                    class="form-control" placeholder="Select end date">
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Sliders</label>
                                <select name="slider" class="form-control">
                                    <option value="0" {{ old('slider') == '0' ? 'selected' : '' }}>Choose one
                                    </option>
                                    <option value="1" {{ old('slider') == '1' ? 'selected' : '' }}>Home Page
                                        Slider
                                    </option>
                                </select>
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Registration Link<sup>*</sup></label>
                                <select name="registration" class="form-control">
                                    <option value="" {{ old('registration') == '' ? 'selected' : '' }}>
                                        Choose
                                        one</option>
                                    <option value="open" {{ old('registration') == 'open' ? 'selected' : '' }}>
                                        Registration Open</option>
                                    <option value="close" {{ old('registration') == 'close' ? 'selected' : '' }}>
                                        Registration Close</option>
                                </select>
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Status<sup>*</sup></label>
                                <select name="status" class="form-control">
                                    <option value="" {{ old('status') == '' ? 'selected' : '' }}>Choose one
                                    </option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="unpublished"
                                        {{ old('status') == 'unpublished' ? 'selected' : '' }}>
                                        Unpublished</option>
                                </select>
                            </div>

                            <x-admin.upload-image name='photo' title='Event Image' size='512 X 512px' />

                            <button type="submit" class="btn theme-btn">Add Event</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
