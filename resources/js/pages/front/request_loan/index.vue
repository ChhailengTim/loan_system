<template>
  <div>
    <headerPage></headerPage>

    <b-card-body class="px-0" style="margin-top: 10rem">
      <b-col sm="12" md="12" xl="12">
        <b-card>
          <b-card-header>
            <b-col cols="12">
              <p style="font-size: x-large" align="center">
                {{ $t("request_loan") }}
              </p>
            </b-col>
          </b-card-header>

          <b-card-body>
            <b-col cols="12">
              <form-wizard
                @on-complete="onComplete"
                title=""
                subtitle=""
                color="#20a0ff"
                error-color="#ff4949"
                :reset="setIndex"
                shape="circle"
                ref="loan_form"
              >
                <tab-content
                  :title="$t('borrower')"
                  :before-change="validateFirstStep"
                >
                  <b-row class="justify-content-md-center">
                    <!--first_name-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('borrower_form.first_name')
                        "
                        :label="$t('first_name') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_first_name"
                          v-validate="'required|max:100'"
                          :state="
                            veeErrors.has('borrower_form.first_name')
                              ? false
                              : null
                          "
                          data-vv-name="first_name"
                          :data-vv-as="$t('first_name')"
                          data-vv-scope="borrower_form"
                          type="text"
                          :placeholder="$t('first_name')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <!--last_name-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('borrower_form.last_name')
                        "
                        :label="$t('last_name') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_last_name"
                          v-validate="'required|max:100'"
                          :state="
                            veeErrors.has('borrower_form.last_name')
                              ? false
                              : null
                          "
                          data-vv-name="last_name"
                          :data-vv-as="$t('last_name')"
                          data-vv-scope="borrower_form"
                          type="text"
                          :placeholder="$t('last_name')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--gender-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :label="$t('gender')"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-select v-model="form.borrower_gender">
                          <b-form-select-option value="1">{{
                            $t("male")
                          }}</b-form-select-option>
                          <b-form-select-option value="2">{{
                            $t("female")
                          }}</b-form-select-option>
                        </b-select>
                      </b-form-group>
                    </b-col>
                    <!--dob-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :state="
                          veeErrors.has('borrower_form.dob') ? false : null
                        "
                        :invalid-feedback="veeErrors.first('borrower_form.dob')"
                        :label="$t('dob') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_dob"
                          v-validate="'required'"
                          :state="
                            veeErrors.has('borrower_form.dob') ? false : null
                          "
                          data-vv-name="dob"
                          :data-vv-as="$t('dob')"
                          data-vv-scope="borrower_form"
                          type="date"
                          :placeholder="$t('dob')"
                          @keydown.enter.prevent="onSubmit"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--email-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :state="
                          veeErrors.has('borrower_form.email') ? false : null
                        "
                        :invalid-feedback="
                          veeErrors.first('borrower_form.email')
                        "
                        :label="$t('email') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_email"
                          v-validate="'required|email|max:100'"
                          :state="
                            veeErrors.has('borrower_form.email') ? false : null
                          "
                          data-vv-name="email"
                          :data-vv-as="$t('email')"
                          data-vv-scope="borrower_form"
                          type="email"
                          :placeholder="$t('email')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <!--business_name-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('borrower_form.business_name')
                        "
                        :label="$t('business_name') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_business_name"
                          v-validate="'required|max:20'"
                          :state="
                            veeErrors.has('borrower_form.business_name')
                              ? false
                              : null
                          "
                          data-vv-name="business_name"
                          :data-vv-as="$t('business_name')"
                          data-vv-scope="borrower_form"
                          type="text"
                          :placeholder="$t('business_name')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--phone-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('borrower_form.phone')
                        "
                        :label="$t('phone') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_phone"
                          v-validate="'required|numeric|min:9|max:10'"
                          :state="
                            veeErrors.has('borrower_form.phone') ? false : null
                          "
                          data-vv-name="phone"
                          :data-vv-as="$t('phone')"
                          data-vv-scope="borrower_form"
                          type="number"
                          min="0"
                          :placeholder="$t('phone')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <!--alt_phone-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('borrower_form.alt_phone')
                        "
                        :label="$t('alt_phone') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.borrower_alt_phone"
                          v-validate="'required|numeric|min:9|max:10'"
                          :state="
                            veeErrors.has('borrower_form.alt_phone')
                              ? false
                              : null
                          "
                          data-vv-name="alt_phone"
                          :data-vv-as="$t('alt_phone')"
                          data-vv-scope="borrower_form"
                          type="number"
                          min="0"
                          :placeholder="$t('alt_phone')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--address-->
                    <b-col sm="12" md="12" xl="6">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('borrower_form.address')
                        "
                        :label="$t('address') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-textarea
                          autocomplete="off"
                          v-model="form.borrower_address"
                          v-validate="'required|max:100'"
                          :state="
                            veeErrors.has('borrower_form.address')
                              ? false
                              : null
                          "
                          data-vv-name="address"
                          :data-vv-as="$t('address')"
                          data-vv-scope="borrower_form"
                          rows="4"
                          :placeholder="$t('address')"
                        ></b-textarea>
                      </b-form-group>
                    </b-col>
                  </b-row>

                  <b-row class="justify-content-md-center mb-3">
                    <b-col sm="12" md="12" xl="6" v-if="$i18n.locale == 'en'">
                      <b>Note: </b> please provide Photo, National ID, Family
                      Book, Morgate and Salary Invoice
                    </b-col>
                    <b-col sm="12" md="12" xl="6" v-if="$i18n.locale == 'kh'">
                      <b>ចំណាំ: </b> សូមភ្ជាប់មកនូវ រូបថត, អត្ថ​សញ្ញាណ​ប​ណ្ណ​,
                      សៀវភៅគ្រួសារ, បញ្ចាំ និង វិក្កយបត្រប្រាក់ខែ
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <b-col sm="12" md="12" xl="6">
                      <b-button @click="openModalBorrowerUpload">
                        <span>
                          <i class="fas fa-file-upload"></i>
                          <span v-if="$i18n.locale == 'en'"
                            >Upload Required Document *</span
                          >
                          <span v-if="$i18n.locale == 'kh'"
                            >បង្ហោះឯកសារដែលត្រូវការ *</span
                          >
                        </span>
                      </b-button>
                    </b-col>
                  </b-row>
                </tab-content>

                <tab-content
                  :title="$t('guarantor')"
                  :before-change="validateSecondStep"
                >
                  <b-row class="justify-content-md-center">
                    <!--first_name-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.first_name')
                        "
                        :label="$t('first_name') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_first_name"
                          v-validate="'required|max:100'"
                          :state="
                            veeErrors.has('guarantor_form.first_name')
                              ? false
                              : null
                          "
                          data-vv-name="first_name"
                          :data-vv-as="$t('first_name')"
                          data-vv-scope="guarantor_form"
                          type="text"
                          :placeholder="$t('first_name')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <!--last_name-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.last_name')
                        "
                        :label="$t('last_name') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_last_name"
                          v-validate="'required|max:100'"
                          :state="
                            veeErrors.has('guarantor_form.last_name')
                              ? false
                              : null
                          "
                          data-vv-name="last_name"
                          :data-vv-as="$t('last_name')"
                          data-vv-scope="guarantor_form"
                          type="text"
                          :placeholder="$t('last_name')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--gender-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :label="$t('gender')"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-select v-model="form.guarantor_gender">
                          <b-form-select-option value="1">{{
                            $t("male")
                          }}</b-form-select-option>
                          <b-form-select-option value="2">{{
                            $t("female")
                          }}</b-form-select-option>
                        </b-select>
                      </b-form-group>
                    </b-col>
                    <!--dob-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.dob')
                        "
                        :label="$t('dob') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_dob"
                          v-validate="'required'"
                          :state="
                            veeErrors.has('guarantor_form.dob') ? false : null
                          "
                          data-vv-name="dob"
                          :data-vv-as="$t('dob')"
                          data-vv-scope="guarantor_form"
                          type="date"
                          :placeholder="$t('dob')"
                          @keydown.enter.prevent="onSubmit"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--email-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :state="
                          veeErrors.has('guarantor_form.email') ? false : null
                        "
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.email')
                        "
                        :label="$t('email') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_email"
                          v-validate="'required|email|max:100'"
                          :state="
                            veeErrors.has('guarantor_form.email') ? false : null
                          "
                          data-vv-name="email"
                          :data-vv-as="$t('email')"
                          data-vv-scope="guarantor_form"
                          type="email"
                          :placeholder="$t('email')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <!--business_name-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.business_name')
                        "
                        :label="$t('business_name') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_business_name"
                          v-validate="'required|max:20'"
                          :state="
                            veeErrors.has('guarantor_form.business_name')
                              ? false
                              : null
                          "
                          data-vv-name="business_name"
                          :data-vv-as="$t('business_name')"
                          data-vv-scope="guarantor_form"
                          type="text"
                          :placeholder="$t('business_name')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--phone-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.phone')
                        "
                        :label="$t('phone') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_phone"
                          v-validate="'required|numeric|min:9|max:10'"
                          :state="
                            veeErrors.has('guarantor_form.phone') ? false : null
                          "
                          data-vv-name="phone"
                          :data-vv-as="$t('phone')"
                          data-vv-scope="guarantor_form"
                          type="number"
                          min="0"
                          :placeholder="$t('phone')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                    <!--alt_phone-->
                    <b-col sm="12" md="12" xl="3">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.alt_phone')
                        "
                        :label="$t('alt_phone') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-form-input
                          autocomplete="off"
                          v-model="form.guarantor_alt_phone"
                          v-validate="'required|numeric|min:9|max:10'"
                          :state="
                            veeErrors.has('guarantor_form.alt_phone')
                              ? false
                              : null
                          "
                          data-vv-name="alt_phone"
                          :data-vv-as="$t('alt_phone')"
                          data-vv-scope="guarantor_form"
                          type="number"
                          min="0"
                          :placeholder="$t('alt_phone')"
                        ></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <!--address-->
                    <b-col sm="12" md="12" xl="6">
                      <b-form-group
                        :invalid-feedback="
                          veeErrors.first('guarantor_form.address')
                        "
                        :label="$t('address') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-textarea
                          autocomplete="off"
                          v-model="form.guarantor_address"
                          v-validate="'required|max:200'"
                          :state="
                            veeErrors.has('guarantor_form.address')
                              ? false
                              : null
                          "
                          data-vv-name="address"
                          :data-vv-as="$t('address')"
                          data-vv-scope="guarantor_form"
                          rows="4"
                          :placeholder="$t('address')"
                        ></b-textarea>
                      </b-form-group>
                    </b-col>
                  </b-row>

                  <b-row class="justify-content-md-center mb-3">
                    <b-col sm="12" md="12" xl="6" v-if="$i18n.locale == 'en'">
                      <b>Note: </b> please provide Photo, National ID, Morgate
                      and Salary Invoice
                    </b-col>
                    <b-col sm="12" md="12" xl="6" v-if="$i18n.locale == 'kh'">
                      <b>ចំណាំ: </b> សូមភ្ជាប់មកនូវ រូបថត, អត្ថ​សញ្ញាណ​ប​ណ្ណ​,
                      បញ្ចាំ និង វិក្កយបត្រប្រាក់ខែ
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center">
                    <b-col sm="12" md="12" xl="6">
                      <b-button
                        variant="success"
                        @click="openModalGuarantorUpload"
                      >
                        <span>
                          <i class="fas fa-file-upload"></i>
                          <span v-if="$i18n.locale == 'en'"
                            >Upload Required Document *</span
                          >
                          <span v-if="$i18n.locale == 'kh'"
                            >បង្ហោះឯកសារដែលត្រូវការ *</span
                          >
                        </span>
                      </b-button>
                    </b-col>
                  </b-row>
                </tab-content>

                <tab-content :title="$t('loan')">
                  <b-row class="justify-content-md-center">
                    <!--company-->
                    <b-col sm="12" md="12" xl="6">
                      <b-form-group
                        :state="
                          veeErrors.has('loan_form.company_id') ? false : null
                        "
                        :invalid-feedback="
                          veeErrors.first('loan_form.company_id')
                        "
                        :label="$t('company') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-select
                          v-model="form.company_id"
                          v-validate="'required'"
                          :state="
                            veeErrors.has('loan_form.company_id') ? false : null
                          "
                          data-vv-name="company_id"
                          :data-vv-as="$t('company')"
                          data-vv-scope="loan_form"
                          @change="onSelectCompany"
                        >
                          <template slot="first">
                            <b-form-select-option :value="null" disabled>
                              {{ $t("company") }}
                            </b-form-select-option>
                          </template>
                          <b-form-select-option
                            v-for="(obj, index) in companySelectData"
                            :value="obj.id"
                            :key="index"
                            >{{ obj.company_name }}</b-form-select-option
                          >
                        </b-select>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row class="justify-content-md-center mt-2">
                    <!-- request_amount -->
                    <b-col sm="12" md="12" lg="12" xl="2">
                      <b-form-group
                        :state="
                          veeErrors.has('loan_form.request_amount')
                            ? false
                            : null
                        "
                        :invalid-feedback="
                          veeErrors.first('loan_form.request_amount')
                        "
                        :label="$t('request_amount') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-input-group append="$">
                          <b-form-input
                            autocomplete="off"
                            v-model="form.request_amount"
                            v-validate="'required'"
                            :state="
                              veeErrors.has('loan_form.request_amount')
                                ? false
                                : null
                            "
                            data-vv-name="request_amount"
                            :data-vv-as="$t('request_amount')"
                            data-vv-scope="loan_form"
                            type="number"
                            min="1"
                            :placeholder="$t('request_amount')"
                            @keyup="onInputRequestAmount"
                          ></b-form-input>
                        </b-input-group>
                      </b-form-group>
                    </b-col>
                    <!--term​ - interest -->
                    <b-col sm="12" md="12" lg="12" xl="2">
                      <b-row>
                        <b-col cols="6">
                          <b-form-group
                            :state="
                              veeErrors.has('loan_form.term') ? false : null
                            "
                            :invalid-feedback="
                              veeErrors.first('loan_form.term')
                            "
                            :label="$t('term') + ' *'"
                            label-class="control-label"
                            class="text-left"
                          >
                              <b-select
                                v-model="form.term"
                                v-validate="'required'"
                                :state="
                                  veeErrors.has('loan_form.term') ? false : null
                                "
                                data-vv-name="term"
                                :data-vv-as="$t('term')"
                                data-vv-scope="loan_form"
                                :disabled="disabledTerm"
                                @change="onSelectTerm"
                              >
                                <template slot="first">
                                  <b-form-select-option :value="null" disabled>
                                    {{ $t("term") }}
                                  </b-form-select-option>
                                </template>
                                <b-form-select-option
                                  v-for="(item, index) in termSelectData"
                                  :value="item.month"
                                  :key="index"
                                  >{{ item.month }}
                                  {{ $t("month") }}</b-form-select-option
                                >
                              </b-select>
                          </b-form-group>
                        </b-col>
                        <b-col cols="6">
                            <b-form-group
                        :state="
                          veeErrors.has('loan_form.interest')
                            ? false
                            : null
                        "
                        :invalid-feedback="
                          veeErrors.first('loan_form.interest')
                        "
                        :label="$t('interest') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                          <b-form-input
                            autocomplete="off"
                            v-model="form.interest"
                            v-validate="'required'"
                            :state="
                              veeErrors.has('loan_form.interest')
                                ? false
                                : null
                            "
                            data-vv-name="interest"
                            :data-vv-as="$t('interest')"
                            data-vv-scope="loan_form"
                            type="text"
                            readonly
                            :placeholder="$t('interest')"
                          ></b-form-input>
                      </b-form-group>
                        </b-col>
                      </b-row>
                    </b-col>
                    <!-- outstanding_amount -->
                    <b-col sm="12" md="12" lg="12" xl="2">
                      <b-form-group
                        :state="
                          veeErrors.has('loan_form.outstanding_amount')
                            ? false
                            : null
                        "
                        :invalid-feedback="
                          veeErrors.first('loan_form.outstanding_amount')
                        "
                        :label="$t('outstanding_amount') + ' *'"
                        label-class="control-label"
                        class="text-left"
                      >
                        <b-input-group append="$">
                          <b-form-input
                            autocomplete="off"
                            v-model="form.outstanding_amount"
                            v-validate="'required'"
                            :state="
                              veeErrors.has('loan_form.outstanding_amount')
                                ? false
                                : null
                            "
                            data-vv-name="outstanding_amount"
                            :data-vv-as="$t('outstanding_amount')"
                            data-vv-scope="loan_form"
                            type="number"
                            min="1"
                            disabled
                            :placeholder="$t('outstanding_amount')"
                          ></b-form-input>
                        </b-input-group>
                      </b-form-group>
                    </b-col>
                  </b-row>
                </tab-content>

                <b-button variant="danger" slot="prev">{{
                  $t("back")
                }}</b-button>
                <b-button variant="success" slot="next">{{
                  $t("next")
                }}</b-button>
                <b-button variant="success" slot="finish">{{
                  $t("finish")
                }}</b-button>
              </form-wizard>
            </b-col>
          </b-card-body>
        </b-card>
      </b-col>
    </b-card-body>
    <div v-if="modalBorrowerUploadShow">
      <modal-upload-borrower
        :modalType="modalBorrowerUploadShowType"
        @closeModal="closeModalBorrowerUpload"
      ></modal-upload-borrower>
    </div>
    <div v-if="modalGuarantorUploadShow">
      <modal-upload-guarantor
        :modalType="modalGuarantorUploadShowType"
        @closeModal="closeModalGuarantorUpload"
      ></modal-upload-guarantor>
    </div>
  </div>
</template>
<script>
import headerPage from "../components/header";
export default {
  components: {
    headerPage,
    ModalUploadBorrower: () => import("./components/ModalUploadBorrower"),
    ModalUploadGuarantor: () => import("./components/ModalUploadGuarantor"),
  },
  data() {
    return {
      form: {
        borrower_first_name: null,
        borrower_last_name: null,
        borrower_gender: 1,
        borrower_dob: null,
        borrower_email: null,
        borrower_business_name: null,
        borrower_phone: null,
        borrower_alt_phone: null,
        borrower_address: null,
        borrower_photo: null,
        borrower_national_photo: null,
        borrower_salary_invoice: null,
        borrower_mortgage: null,
        borrower_family_book: null,

        guarantor_first_name: null,
        guarantor_last_name: null,
        guarantor_gender: 1,
        guarantor_dob: null,
        guarantor_email: null,
        guarantor_business_name: null,
        guarantor_phone: null,
        guarantor_alt_phone: null,
        guarantor_address: null,
        guarantor_photo: null,
        guarantor_national_photo: null,
        guarantor_salary_invoice: null,
        guarantor_mortgage: null,

        company_id: null,
        request_amount: null,
        term: null,
        interest: null,
        outstanding_amount: null,
      },
      defaultForm: {
        borrower_first_name: null,
        borrower_last_name: null,
        borrower_gender: 1,
        borrower_dob: null,
        borrower_email: null,
        borrower_business_name: null,
        borrower_phone: null,
        borrower_alt_phone: null,
        borrower_address: null,
        borrower_photo: null,
        borrower_national_photo: null,
        borrower_salary_invoice: null,
        borrower_mortgage: null,
        borrower_family_book: null,

        guarantor_first_name: null,
        guarantor_last_name: null,
        guarantor_gender: 1,
        guarantor_dob: null,
        guarantor_email: null,
        guarantor_business_name: null,
        guarantor_phone: null,
        guarantor_alt_phone: null,
        guarantor_address: null,
        guarantor_photo: null,
        guarantor_national_photo: null,
        guarantor_salary_invoice: null,
        guarantor_mortgage: null,

        company_id: null,
        request_amount: null,
        term: null,
        interest: null,
        outstanding_amount: null,
      },
      setIndex: false,
      modalBorrowerUploadShow: false,
      modalBorrowerUploadShowType: 0,
      modalGuarantorUploadShow: false,
      modalGuarantorUploadShowType: 0,
      termSelectData: [],
      companySelectData: [],
      disabledTerm: true,
    };
  },
  computed: {
  },
  created() {
    this.getCompanyList();
  },
  methods: {
    getCompanyList() {
      axios.post("/company/get_all", { loading: false }).then((response) => {
        if (response.status == 200) {
          this.companySelectData = response.data.data;
        }
      });
    },
    openModalBorrowerUpload() {
      this.modalBorrowerUploadShow = true;
      this.modalBorrowerUploadShowType = 1;
    },
    closeModalBorrowerUpload(data) {
      this.modalBorrowerUploadShow = false;
      this.modalBorrowerUploadShowType = 0;

      if (this.$helpers.nullToVoid(data) != "") {
        this.form.borrower_photo = data.photo;
        this.form.borrower_family_book = data.family_book;
        this.form.borrower_national_photo = data.national;
        this.form.borrower_mortgage = data.mortgage;
        this.form.borrower_salary_invoice = data.salary_invoice;
      }
    },
    openModalGuarantorUpload() {
      this.modalGuarantorUploadShow = true;
      this.modalGuarantorUploadShowType = 1;
    },
    closeModalGuarantorUpload(data) {
      this.modalGuarantorUploadShow = false;
      this.modalGuarantorUploadShowType = 0;

      if (this.$helpers.nullToVoid(data) != "") {
        this.form.guarantor_photo = data.photo;
        this.form.guarantor_national_photo = data.national;
        this.form.guarantor_mortgage = data.mortgage;
        this.form.guarantor_salary_invoice = data.salary_invoice;
      }
    },
    async validateFirstStep() {
      /**
       *  Check form 1 validation
       */
      let vm = this;
      let checkValidation = false;

      await this.$validator.validateAll("borrower_form").then((result) => {
        if (result) {
          if (
            this.form.borrower_photo == null ||
            this.form.borrower_national_photo == null ||
            this.form.borrower_family_book == null ||
            this.form.borrower_mortgage == null ||
            this.form.borrower_salary_invoice == null
          ) {
            swal.fire({
              icon: "warning",
              title: vm.$t("borrower"),
              text:
                vm.$i18n.locale == "en"
                  ? "Please check required document again"
                  : vm.$i18n.locale == "kh"
                  ? "សូមពិនិត្យឯកសារដែលត្រូវការម្តងទៀត"
                  : "",
            });
            return;
          }

          checkValidation = true;
        } else {
          checkValidation = false;
          vm.$notify({
            group: "message",
            type: "warning",
            title: vm.$t("borrower"),
            text: vm.$t("validation_failed"),
          });
        }
      });
      return checkValidation;
    },
    async validateSecondStep() {
      /**
       *  Check form 2 validation
       */
      let vm = this;
      let checkValidation = false;

      await this.$validator.validateAll("guarantor_form").then((result) => {
        if (result) {
          if (
            this.form.guarantor_photo == null ||
            this.form.guarantor_national_photo == null ||
            this.form.guarantor_mortgage == null ||
            this.form.guarantor_salary_invoice == null
          ) {
            swal.fire({
              icon: "warning",
              title: vm.$t("guarantor"),
              text:
                vm.$i18n.locale == "en"
                  ? "Please check required document again"
                  : vm.$i18n.locale == "kh"
                  ? "សូមពិនិត្យឯកសារដែលត្រូវការម្តងទៀត"
                  : "",
            });
            return;
          }

          checkValidation = true;
        } else {
          checkValidation = false;
          vm.$notify({
            group: "message",
            type: "warning",
            title: vm.$t("guarantor"),
            text: vm.$t("validation_failed"),
          });
        }
      });
      return checkValidation;
    },
    onComplete: function () {
      /**
       *  Check form 3 validation
       */
      let vm = this;
      let checkValidation = false;

      this.$validator.validateAll("loan_form").then((result) => {
        if (result) {
          let url = "/loan/request_loan";

          let input = this.form;

          checkValidation = true;

          this.calulateOutStandingAmount();

          axios
            .post(url, input)
            .then((response) => {
              console.log(response);
              if (
                this.$helpers.nullToVoid(response) != "" &&
                response.status == 200
              ) {
                this.clearForm();

                swal.fire({
                  icon: "success",
                  title: this.$t("request_loan"),
                  text:
                    this.$i18n.locale == "en"
                      ? "Thank you please check your email to see more information."
                      : this.$i18n.locale == "kh"
                      ? "សូមអរគុណសូមពិនិត្យមើលអ៊ីមែលរបស់អ្នកដើម្បីមើលព័ត៌មានបន្ថែម"
                      : "",
                });
              }
            })
            .catch(function (error) {
              console.log(error);
            });
        } else {
          checkValidation = false;
          vm.$notify({
            group: "message",
            type: "warning",
            title: vm.$t("loan"),
            text: vm.$t("validation_failed"),
          });
        }
      });
      return checkValidation;
    },
    clearForm() {
      this.form = Object.assign({}, this.defaultForm);

      this.$nextTick(() => {
        this.$validator.reset();
        this.$refs.loan_form.reset();
      });
    },
    onSelectCompany() {
      let data = this.companySelectData.find(
        (item) => item.id === this.form.company_id
      );
      this.termSelectData = data.company_interest;

      this.form.request_amount = null;
      this.form.term = null;
      this.form.outstanding_amount = null;
      this.disabledTerm = false;

      this.$nextTick(() => {
        this.$validator.reset();
      });
    },
    onSelectTerm() {
      this.calulateOutStandingAmount();
    },
    onInputRequestAmount() {
      this.calulateOutStandingAmount();
    },
    calulateOutStandingAmount() {
      if(this.$helpers.nullToVoid(this.form.term) != ''){
          let data = this.termSelectData.find(
            (obj) => obj.month === this.form.term
        );

        let total =
            parseInt(this.form.request_amount) *
            data.interest *
            parseInt(this.form.term) +
            parseFloat(this.form.request_amount);
        this.form.interest = data.interest;

        if (total !== NaN) {
            this.form.outstanding_amount = parseFloat(total).toFixed(2);
        }
      }
    },
  },
};
</script>
<style scoped>
.card {
  border-radius: 1.25rem;
}
</style>
