@props(['members' => [], 'editRoute' => '', 'deleteRoute' => '', 'showRoute' => ''])

<div class=" mt-4">
    <div class="table-responsive">
        <div class="table-responsive">
            <table id="adminTable" class="table align-middle table-hover text-left table-striped">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td>
                                <img src="{{ $member->photo ?? ($member->image ?? asset('/public/storage/default/category.png')) }}"
                                    alt="Member Photo" width="50" height="50" style="object-fit: cover;">
                            </td>
                            <td>{{ $member->full_name ?? $member->name_bn }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->mobile }}</td>

                            <x-admin.action-button id="{{ $member->id }}" edit="{{ $editRoute }}"
                                delete="{{ $deleteRoute }}" show="{{ $showRoute }}" />

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No members found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
