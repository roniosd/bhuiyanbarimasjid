<x-app-layout title="Student List">
    <div class="content-area">
        <div class="row">
            <div class="">
                <div class="content-inner">
                    <div class="custom-card p-1">
                        <div class="custom-card-header ">

                            <div class="heading">

                                <h1>Student List</h1>
                            </div>
                            <div class="d-flex gap-4">
                                <a class="btn btn-success" href="{{ route('student.create') }}">+</a>
                            </div>
                        </div>
                        <x-admin.members-table :members="$student" editRoute="student.edit" deleteRoute="student.destroy"
                            showRoute="student.show" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
