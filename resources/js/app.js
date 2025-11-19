import Alpine from 'alpinejs'
import ghostForm from './ghostForm'
import sendRequest from './sendRequest'
import stripEmptyFields from './stripEmptyFields'
import upload from './upload'

window.Alpine = Alpine
window.ghostForm = ghostForm
window.sendRequest = sendRequest
window.stripEmptyFields = stripEmptyFields
window.upload = upload

Alpine.start()