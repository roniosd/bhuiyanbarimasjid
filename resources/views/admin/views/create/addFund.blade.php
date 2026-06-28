<x-app-layout title="Add Fund">
    <div class="content-area">
        <form action="{{route('fund.store')}}" method="POST" enctype="multipart/form-data" class="row theme-form">
            @csrf
            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="content-inner">
                    <div class="custom-card">

                        <div class="custom-card-header">
                            <div class="heading">
                                <h1>Add Fund</h1>
                            </div>
                            <div class="header-rigth">
                                <p>Fields marked with * must be filled</p>
                            </div>
                            <div class="seeAll">
                                <a href="{{route('fund.index')}}">See All</a>
                            </div>
                        </div>
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Title <sup>*</sup></label>
                                        <input type="text" id="Title" name="title" class="form-control"
                                            placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group custom-form-group">
                                        <label for="">Enter Slug <sup>*</sup></label>
                                        <input type="text" name="slug" id="unique_url" class="form-control"
                                            placeholder="Enter slug">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Donation Unit</label>
                                        <input type="number" name="donation_unit" class="form-control"
                                            placeholder="Donation Unit">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group custom-form-group">
                                        <label for="">Donation Inforamation</label>
                                        <input type="text" name="donation_info" class="form-control"
                                            placeholder="Donation info">
                                    </div>
                                </div>
                                <div class="form-group custom-form-group">
                                    <textarea placeholder="Fund descriptions" name="description" id="editor"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div style="padding-left: 0px" class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="sidebar-widgets">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="form-group custom-form-group">
                                <label for="">Show Payment Method</label>
                                <select name="show_payment_method" class="form-control">
                                    <option value="">Choose one</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Show Membership </label>
                                <select name="show_membership" class="form-control">
                                    <option value="">Choose one</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group custom-form-group">
                                <label for="">Status <sup>*</sup></label>
                                <select name="status" class="form-control">
                                    <option value="">Choose one</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <x-admin.upload-image name='featured_photo' title='Fund Image' size='512 X 512px' />
                            <button type="submit" class="btn theme-btn">Add Fund</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>