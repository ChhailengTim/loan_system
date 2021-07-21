<template>
    <div>
        <header-page></header-page>

        <div class="container mt-5">
            <b-card no-body class="card-table shadow">
                <b-card-body>
                    <b-row>
                        <b-col cols="12">
                            <b-tabs content-class="mt-3" card no-fade>
                                <b-tab :title="$t('borrower')" active>
                                    <b-row>
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('company_id')"
                                                :label="$t('company')"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-select
                                                    v-model="form.company_id"
                                                >
                                                    <b-form-select-option value="1">{{ $t('ABA') }}</b-form-select-option>
                                                    <b-form-select-option value="2">{{ $t('Acleda') }}</b-form-select-option>
                                                    <b-form-select-option value="3">{{ $t('AMK') }}</b-form-select-option>
                                                </b-select>
                                            </b-form-group>
                                        </b-col>

                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('interest')"
                                                :label="$t('interest')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.interest"
                                                    v-validate="'required|max:8'"
                                                    :state="veeErrors.has('interest') ? false : null"
                                                    data-vv-name="interest"
                                                    :data-vv-as="$t('interest')"
                                                    min="0"
                                                    type="number"
                                                    :placeholder="$t('interest')"
                                                    disabled
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--first_name-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('first_name')"
                                                :label="$t('first_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.first_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('first_name') ? false : null"
                                                    data-vv-name="first_name"
                                                    :data-vv-as="$t('first_name')"
                                                    type="text"
                                                    :placeholder="$t('first_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--last_name-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('last_name')"
                                                :label="$t('last_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.last_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('last_name') ? false : null"
                                                    data-vv-name="last_name"
                                                    :data-vv-as="$t('last_name')"
                                                    type="text"
                                                    :placeholder="$t('last_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--business_name-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('business_name')"
                                                :label="$t('business_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.business_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('business_name') ? false : null"
                                                    data-vv-name="business_name"
                                                    :data-vv-as="$t('business_name')"
                                                    type="text"
                                                    :placeholder="$t('business_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--gender-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('gender')"
                                                :label="$t('gender')"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-select
                                                    v-model="form.gender"
                                                >
                                                    <b-form-select-option value="1">{{ $t('male') }}</b-form-select-option>
                                                    <b-form-select-option value="2">{{ $t('female') }}</b-form-select-option>
                                                </b-select>
                                            </b-form-group>
                                        </b-col>
                                        <!--dob-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :label="$t('dob')"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.dob"
                                                    type="date"
                                                    :placeholder="$t('dob')"
                                                    @keydown.enter.prevent="onSubmit"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--phone-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('phone')"
                                                :label="$t('phone')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.phone"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('phone') ? false : null"
                                                    data-vv-name="phone"
                                                    :data-vv-as="$t('phone')"
                                                    type="text"
                                                    :placeholder="$t('phone')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--alt_phone-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('alt_phone')"
                                                :label="$t('alt_phone')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.alt_phone"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('alt_phone') ? false : null"
                                                    data-vv-name="alt_phone"
                                                    :data-vv-as="$t('alt_phone')"
                                                    type="text"
                                                    :placeholder="$t('alt_phone')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--email-->
                                        <b-col cols="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('email')"
                                                :label="$t('email')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.email"
                                                    v-validate="'required|email'"
                                                    :state="veeErrors.has('email') ? false : null"
                                                    data-vv-name="email"
                                                    :data-vv-as="$t('email')"
                                                    type="text"
                                                    :placeholder="$t('email')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--address-->
                                        <b-col cols="12">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('phone')"
                                                :label="$t('address')"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-textarea
                                                    autocomplete="off"
                                                    v-model="form.address"
                                                    rows="5"
                                                    :placeholder="$t('address')"
                                                ></b-textarea>
                                            </b-form-group>
                                        </b-col>

                                    </b-row>
                                </b-tab>
                                <b-tab :title="$t('guarantor')">
                                    <b-row>

                                    <!--first_name-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('first_name')"
                                            :label="$t('first_name') + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.first_name"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('first_name') ? false : null"
                                                data-vv-name="first_name"
                                                :data-vv-as="$t('first_name')"
                                                type="text"
                                                :placeholder="$t('first_name')"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--last_name-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('last_name')"
                                            :label="$t('last_name') + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.last_name"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('last_name') ? false : null"
                                                data-vv-name="last_name"
                                                :data-vv-as="$t('last_name')"
                                                type="text"
                                                :placeholder="$t('last_name')"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--business_name-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('business_name')"
                                            :label="$t('business_name') + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.business_name"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('business_name') ? false : null"
                                                data-vv-name="business_name"
                                                :data-vv-as="$t('business_name')"
                                                type="text"
                                                :placeholder="$t('business_name')"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--gender-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('gender')"
                                            :label="$t('gender')"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-select
                                                v-model="form.gender"
                                            >
                                                <b-form-select-option value="1">{{ $t('male') }}</b-form-select-option>
                                                <b-form-select-option value="2">{{ $t('female') }}</b-form-select-option>
                                            </b-select>
                                        </b-form-group>
                                    </b-col>
                                    <!--dob-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :label="$t('dob')"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.dob"
                                                type="date"
                                                :placeholder="$t('dob')"
                                                @keydown.enter.prevent="onSubmit"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--phone-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('phone')"
                                            :label="$t('phone')  + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.phone"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('phone') ? false : null"
                                                data-vv-name="phone"
                                                :data-vv-as="$t('phone')"
                                                type="text"
                                                :placeholder="$t('phone')"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--alt_phone-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('alt_phone')"
                                            :label="$t('alt_phone')  + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.alt_phone"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('alt_phone') ? false : null"
                                                data-vv-name="alt_phone"
                                                :data-vv-as="$t('alt_phone')"
                                                type="text"
                                                :placeholder="$t('alt_phone')"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--email-->
                                    <b-col cols="6">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('email')"
                                            :label="$t('email')  + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.email"
                                                v-validate="'required|email'"
                                                :state="veeErrors.has('email') ? false : null"
                                                data-vv-name="email"
                                                :data-vv-as="$t('email')"
                                                type="text"
                                                :placeholder="$t('email')"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-col>
                                    <!--address-->
                                    <b-col cols="12">
                                        <b-form-group
                                            :invalid-feedback="veeErrors.first('phone')"
                                            :label="$t('address')"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-textarea
                                                autocomplete="off"
                                                v-model="form.address"
                                                rows="5"
                                                :placeholder="$t('address')"
                                            ></b-textarea>
                                        </b-form-group>
                                    </b-col>

                                </b-row>
                                </b-tab>
                            </b-tabs>
                        </b-col>
                    </b-row>
                </b-card-body>
                <b-card-footer>
                    <b-col cols="12">
                        <b-button type="submit" variant="outline-primary" class="float-right ml-2">
                            <i class="fas fa-save mr-1"></i>
                            {{ $t('save') }}
                        </b-button>

                        <b-button variant="outline-danger"  class="float-right">
                            <i class="fas fa-times-circle mr-1"></i>
                             {{ $t('close') }}
                        </b-button>
                    </b-col>
                </b-card-footer>
        </b-card>
        </div>
    </div>
</template>
<script>
import headerPage from '../components/header'
export default {
    components: {
        headerPage
    },
    data() {
        return {
            form: {}
        }
    }
}
</script>
<style scoped>
.card{
    border-radius: 1.25rem;
}
</style>
