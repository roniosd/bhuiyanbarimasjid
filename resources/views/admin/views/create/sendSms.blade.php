    <x-form.add-form title="Send SMS" url="sendsms" seeall="{{ false }}" button="Send SMS">

        <x-form.form-select label="সদস্য ধরন" name="member_type" :options="[
            '' => 'Select One',
            'social' => 'সামাজিক সদস্য',
            'general' => 'সাধারণ সদস্য',
            'premium' => 'দাতা সদস্য',
            'vip' => 'আজীবন সদস্য',
        ]" />

        <div id="selectedMembers"></div>

        <x-form.form-textarea label="Message" name="message" rows="6">
            {{ old('message') }}
        </x-form.form-textarea>

        <x-slot name="sitecontent">

            <div class="=">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200">
                        <div>
                            <h3 class="font-semibold text-gray-900">সদস্য তালিকা</h3>
                            <p class="text-sm text-gray-500">SMS প্রাপক নির্বাচন করুন</p>
                        </div>

                        <span id="memberCount"
                            class="inline-flex items-center justify-center min-w-7 h-7 px-2 rounded-full bg-primary-100 text-primary-700 text-sm font-semibold">
                            0
                        </span>
                    </div>

                    <div class="p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-700 cursor-pointer">
                                <input type="checkbox" id="selectAllMembers" class="rounded border-gray-300">
                                Select All
                            </label>
                        </div>

                        <div id="memberList" class="max-h-125 overflow-y-auto space-y-2">
                            <div class="text-center py-10 text-gray-400">
                                <p class="text-sm">প্রথমে সদস্য ধরন নির্বাচন করুন</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

    </x-form.add-form>




    <script>
        const memberType = document.querySelector('[name="member_type"]');
        const memberList = document.getElementById('memberList');
        const memberCount = document.getElementById('memberCount');
        const selectAllMembers = document.getElementById('selectAllMembers');

        memberType?.addEventListener('change', function() {
            const type = this.value;

            selectAllMembers.checked = false;
            memberCount.textContent = '0';

            if (!type) {
                memberList.innerHTML = `
                <div class="text-center py-10 text-gray-400">
                    <p class="text-sm">প্রথমে সদস্য ধরন নির্বাচন করুন</p>
                </div>
            `;
                return;
            }

            memberList.innerHTML = `
            <div class="flex justify-center py-10">
                <div class="animate-spin h-6 w-6 rounded-full border-2 border-gray-300 border-t-primary-600"></div>
            </div>
        `;

            fetch(`{{ url('sendsms/members') }}?member_type=${encodeURIComponent(type)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to load members');
                    }

                    return response.json();
                })
                .then(members => {
                    if (!members.length) {
                        memberList.innerHTML = `
                        <div class="text-center py-10 text-gray-400">
                            <p class="text-sm">এই ধরনের কোনো সদস্য পাওয়া যায়নি।</p>
                        </div>
                    `;
                        return;
                    }

                    memberList.innerHTML = members.map(member => `
                   <div class="border rounded p-2 mb-2"> <div class="form-check"> <input class="form-check-input member-checkbox" type="checkbox" name="members[]" value="${member.id}" id="member_${member.id}" > <label class="form-check-label w-100" for="member_${member.id}" > <div class="fw-semibold"> ${escapeHtml(member.full_name || 'সদস্য')} </div> <small class="text-muted"> ${escapeHtml(member.mobile  || '')} </small> </label> </div> </div>
                `).join('');

                    addCheckboxListeners();
                })
                .catch(error => {
                    console.error(error);

                    memberList.innerHTML = `
                    <div class="text-center py-10 text-red-500">
                        <p class="text-sm">সদস্য তালিকা লোড করতে সমস্যা হয়েছে।</p>
                    </div>
                `;
                });
        });

        function addCheckboxListeners() {
            document.querySelectorAll('.member-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updateMemberCount);
            });
        }

        function updateMemberCount() {
            const checkboxes = document.querySelectorAll('.member-checkbox');
            const checked = document.querySelectorAll('.member-checkbox:checked');

            memberCount.textContent = checked.length;

            selectAllMembers.checked =
                checkboxes.length > 0 &&
                checked.length === checkboxes.length;
        }

        selectAllMembers.addEventListener('change', function() {
            document.querySelectorAll('.member-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });

            updateMemberCount();
        });

        function escapeHtml(value) {
            const div = document.createElement('div');
            div.textContent = value;
            return div.innerHTML;
        }
    </script>
