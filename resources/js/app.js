import Alpine from 'alpinejs'
import ghostForm from './ghostForm'
import sendRequest from './sendRequest'
import upload from './upload'

window.Alpine = Alpine
window.ghostForm = ghostForm
window.sendRequest = sendRequest
window.upload = upload

Alpine.start()