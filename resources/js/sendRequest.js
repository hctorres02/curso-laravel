export default async function (url, fields = {}) {
    if (!url) {
        return
    }

    const body = new FormData()

    for (const [name, value] of Object.entries(fields)) {
        if (value instanceof FileList) {
            for (const file of value) {
                body.append(`${name}[]`, file)
            }

            continue
        }

        body.append(name, value)
    }

    if (url.startsWith('http') && new URL(url).origin == location.origin) {
        const _token = document.querySelector('meta[name="csrf_token"]')?.content

        if (!_token) {
            throw new Error('CSRF token not exists.')
        }

        body.append('_token', _token)
    }

    const response = await fetch(url, {
        body,
        method: 'post',
        headers: {
            accept: 'application/json',
        },
    })

    if (!response.ok) {
        throw new Error(response.statusText)
    }

    return await response.text()
}