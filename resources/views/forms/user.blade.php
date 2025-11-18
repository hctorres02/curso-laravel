@use(\App\Enums\UserRole)

<x-input label="Name" name="name" required />
<x-input label="Email" name="email" required />
<div x-data="{ toggleChecked, togglePermissions }" class="grid">
    <x-select label="Role" name="role" :options="$roles" @change="togglePermissions" x-ref="role" required />
    <x-checkbox label="Permissions" name="permissions" :options="$permissions" @change="toggleChecked" />
</div>

@push('body-end')
    <script>
        const rolePermissions = @json(UserRole::toArray('permissions'))

        function init() {
            this.$nextTick(() => this.$refs.role.dispatchEvent(new Event('change')))
        }

        function toggleChecked(event) {
            const cb = event.target

            cb.setAttribute('data-checked', true)
        }

        function togglePermissions(event) {
            const role = event.target.value
            const permissions = rolePermissions[role] ?? []
            const checkboxes = this.$root.querySelectorAll('input[type="checkbox"]')

            checkboxes.forEach(function (cb) {
                const isCore = permissions.includes(cb.value)
                const isExtra = JSON.parse(cb.dataset.checked)

                cb.disabled = isCore
                cb.checked = isCore || isExtra
            })
        }
    </script>
@endpush