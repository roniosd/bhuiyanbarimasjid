<x-app-layout title="Add Event">
    <div class="content-area">
        <form action="{{route('event.update', $event->id)}}" method="POST" enctype="multipart/form-data"
            class="row theme-form">
            @csrf
            @method('PUT')
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>Update Event</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{route('event.index')}}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Title</label>
                                        <input value="{{$event->title}}" type="text" id="Title" name="title"
                                            class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug</label>
                                        <input type="text" value="{{$event->slug}}" name="slug" id="unique_url"
                                            class="form-control" placeholder="Enter slug">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Tagline or Slogan</label>
                                        <input value="{{$event->slogan}}" type="text" name="slogan" class="form-control"
                                            placeholder="Tagline or slogan">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Location or Venue(in Bangla)</label>
                                        <input value="{{$event->venue}}" type="text" name="venue" class="form-control"
                                            placeholder="Location or Venue name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Latitude</label>
                                        <input value="{{$event->latitude}}" type="text" name="latitude"
                                            class="form-control" placeholder="Latitude on Google map">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Longitude</label>
                                        <input value="{{$event->longitude}}" type="text" name="longitude"
                                            class="form-control" placeholder="Longitude on Google map">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Map Zoom Factor</label>
                                        <input value="{{$event->zoom}}" type="text" name="zoom" class="form-control"
                                            placeholder="Google map zoom factor">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Map Height</label>
                                        <input value="{{$event->height}}" type="text" name="height" class="form-control"
                                            placeholder="Google map height">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Map Width</label>
                                        <input value="{{$event->width}}" type="text" name="width" class="form-control"
                                            placeholder="Google map width">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">City</label>
                                        <input value="{{$event->city}}" type="text" name="city" class="form-control"
                                            placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Email</label>
                                        <input value="{{$event->email}}" type="email" name="email" class="form-control"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control lh-lg" style="resize: none;"
                                            placeholder="Write a short descriptions" name="short_description" rows="2"
                                            id="">{{$event->short_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group custom-form-group">
                                <textarea placeholder="Event descriptions" name="description"
                                    id="editor">{{$event->description}}</textarea>
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
                                <label for="end_date" class="form-label">Start Date</label>
                                <input value="{{$event->start_date}}" type="date" name="start_date" id="end_date"
                                    class="form-control" placeholder="Select Start date">
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="end_date" class="form-label">End Date</label>
                                <input value="{{$event->end_date}}" type="date" name="end_date" id="end_date"
                                    class="form-control" placeholder="Select end date">
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Sliders</label>
                                <select name="slider" class="form-control">
                                    <option value="0">Choose one</option>
                                    <option {{$event->slider == 1 ? "selected" : ""}} value="1">Home Page Slider</option>
                                </select>
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Registration Link</label>
                                <select name="registration" class="form-control">
                                    <option value="">Choose one</option>
                                    <option {{$event->registration == "open" ? "selected" : ""}} value="open">Registration
                                        Open</option>
                                    <option {{$event->registration == "close" ? "selected" : ""}} value="close">
                                        Registration Close</option>
                                </select>
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Choose one</option>
                                    <option {{$event->status == "published" ? "selected" : ""}} value="published">
                                        Published</option>
                                    <option {{$event->status == "unpublished" ? "selected" : ""}}value="unpublished">
                                        Unpublished</option>
                                </select>
                            </div>
                           
                            <x-admin.upload-image name='photo' title='Event Image' size='512 X 512px'
                                :img="'event/' . $event->photo" />
                            <button type="submit" class="btn theme-btn">Update Event</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>