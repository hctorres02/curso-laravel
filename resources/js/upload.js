export default async function (url, accept = '*') {
    return new Promise(function (resolve) {
        Object.assign(document.createElement('input'), {
            accept,
            type: 'file',
            multiple: true,
            async onchange() {
                const response = await sendRequest(url, { attachments: this.files }) || []

                resolve(response)
            }
        }).click()
    })
}