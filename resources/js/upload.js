export default async function (url, name, accept = '*') {
    return new Promise(function (resolve) {
        Object.assign(document.createElement('input'), {
            accept,
            type: 'file',
            multiple: true,
            async onchange(event) {
                const files = event.target.files
                const response = await sendRequest(url, { [name]: files }) || []

                resolve(response)
            }
        }).click()
    })
}