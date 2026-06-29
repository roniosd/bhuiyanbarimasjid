<x-form.add-form title="Update Contact Info" action="orgContactUpdate" button="Update Contact" class="col-span-4">
    <x-form.form-input label="Address" name="address" :value="$contact->address ?? ''" placeholder="Enter address"
        required />

    <x-form.form-input label="Email" name="email" type="email" :value="$contact->email ?? ''"
        placeholder="Enter email" />

    <x-form.form-input label="TNT (Landline)" name="tnt" :value="$contact->tnt ?? ''" placeholder="Enter TNT" />

    <x-form.form-input label="Mobile" name="mobile" :value="$contact->mobile ?? ''"
        placeholder="Enter mobile number" />

    <x-form.form-input divClass="col-span-2" label="Map" name="map" type="url" :value="$contact->map ?? ''"
        placeholder="Enter a map url" />
</x-form.add-form>
