<x-app-layout title="Member List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Member List</h1>
                            </div>
                            <div class="d-flex gap-4">
                                <a class="btn btn-success" href="{{ route('member.create') }}">+</a>
                            </div>
                        </div>
                        
                        <x-admin.members-table :members="$members" editRoute="member.edit" deleteRoute="member.destroy"
                            showRoute="member.show" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
