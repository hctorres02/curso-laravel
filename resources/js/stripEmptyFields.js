export default function () {
    const form = this.$event.target

    form.querySelectorAll('input, select, textarea').forEach(function (field) {
        if (field.value === '' || field.value === 'null') {
            field.removeAttribute('name')
        }
    })

    form.submit()
}