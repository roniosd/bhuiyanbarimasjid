
<x-app-layout title="Student Info">
    <div class="content-area py-5"
        style=" display: flex; align-items: center;justify-content: center; flex-direction: column;">
        <div class="custom-card-header w-50" style="border-bottom: 1px solid grey; padding: 10px;">
            <div class="heading">
                <h1>{{$student->name_bn}} সম্পর্কে</h1>
            </div>

            <div class="text-center">
                <a href="{{ route('download.student', $student->id) }}" target="_blank" id="downloadBtn"
                    class="btn btn-primary">Print</a>
            </div>
        </div>
        <x-admin.studentInfo :student="$student" />

    </div>
</x-app-layout>