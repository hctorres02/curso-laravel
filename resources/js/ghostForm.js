export default function (action, method = null, question = 'Are you sure?') {
    if (question && !confirm(question)) {
        return
    }

    const form = Object.assign(document.createElement('form'), { action, method: 'post' })
    const fields = {
        _method: method,
        _token: document.querySelector('meta[name="csrf_token"]')?.content
    }

    for (const [name, value] of Object.entries(fields)) {
        if (!value) {
            continue
        }

        const field = Object.assign(document.createElement('input'), { name, value, type: 'hidden' })

        form.append(field)
    }

    document.body.append(form)
    form.submit()
}