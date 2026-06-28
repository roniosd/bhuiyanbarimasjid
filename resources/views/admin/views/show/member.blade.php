<x-app-layout title="Member Info">
    <div class="content-area py-5"
        style=" display: flex; align-items: center;justify-content: center; flex-direction: column;">
        <div class="custom-card-header w-50" style="border-bottom: 1px solid grey; padding: 10px;">
            <div class="heading">
                <h1>{{$member->name_bn}} সম্পর্কে</h1>
            </div>

            <div class="text-center">
                <a href="{{ route('download.member', $member->id) }}" target="_blank" id="downloadBtn"
                    class="btn btn-primary">Print</a>
            </div>
        </div>
        <x-admin.memberInfo :member="$member" />

    </div>
</x-app-layout>