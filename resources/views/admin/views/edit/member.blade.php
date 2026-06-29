<x-form.add-form title="Edit Member" url="member" button="Update Member" :id="$member->id">
    <x-form.form-input label="Full Name" name="full_name" :value="$member->full_name" required />

    <x-form.form-input label="Date of Birth" name="dob" type="date" :value="$member->dob" required />

    <x-form.form-input label="Father's Name" name="father" :value="$member->father" required />

    <x-form.form-input label="Mother's Name" name="mother" :value="$member->mother" required />

    <x-form.form-input label="Mobile" name="mobile" :value="$member->mobile" required />

    <x-form.form-input label="Email" name="email" type="email" :value="$member->email" />

    <x-form.form-input label="Occupation" name="occupation" :value="$member->occupation" />

    <x-form.form-input label="Workspace" name="workspace" :value="$member->workspace" />

    <x-form.form-input label="Education" name="education" :value="$member->education" />

    <x-form.form-textarea label="Note" name="note" rows="3">
        {{ $member->note }}
    </x-form.form-textarea>

    <x-form.form-input label="Permanent Village" name="village" :value="optional($member->permanentAddress)->village" required />

    <x-form.form-input label="Permanent Post" name="post" :value="optional($member->permanentAddress)->post" required />

    <x-form.form-input label="Permanent Subdistrict" name="subdistrict" :value="optional($member->permanentAddress)->subdistrict" required />

    <x-form.form-input label="Permanent District" name="district" :value="optional($member->permanentAddress)->district" required />

    <x-form.form-input label="Present Village" name="preVillage" :value="optional($member->presentAddress)->village" />

    <x-form.form-input label="Present Post" name="prePost" :value="optional($member->presentAddress)->post" />

    <x-form.form-input label="Present Subdistrict" name="preSubdistrict" :value="optional($member->presentAddress)->subdistrict" />

    <x-form.form-input label="Present District" name="preDistrict" :value="optional($member->presentAddress)->district" />

    <x-slot name="sitecontent">
        <x-imginputshow name="photo" title="Member Photo" size="Maximum 2 MB" :img="$member->photo" />

        <x-form.form-select label="Member Type" name="member_type" :value="$member->member_type" :options="[
            'general' => 'General',
            'premium' => 'Premium',
            'vip' => 'VIP',
            'social' => 'Social',
        ]" required />

        <x-form.form-select label="Status" name="status" :value="$member->status" :options="[
            'active' => 'Active',
            'inactive' => 'Inactive',
        ]" required />
    </x-slot>
</x-form.add-form>
