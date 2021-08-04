<template>
  <b-modal
    v-model="modalShow"
    centered
    no-close-on-backdrop
    no-close-on-esc
    hide-header-close
    hide-header
    size="lg"
    content-class="custom-modal"
  >
    <template slot="modal-header">
      <h3><i class="fas fa-people-carry"></i> {{ $t("detail") }}</h3>
    </template>
    <div class="d-block">
      <b-row>
        <b-col cols="12">
          <b-card>
            <b-tabs card>
              <b-tab :title="$t('guarantor')" active>
                <b-row>
                  <b-col cols="6">
                    {{ $t("first_name") }}:
                    <b>{{ formItem.first_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("gender") }}:
                    <b v-if="formItem.gender == 1">{{ $t("male") }}</b>
                    <b v-if="formItem.gender == 2">{{ $t("female") }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("last_name") }}:
                    <b>{{ formItem.last_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("dob") }}:
                    <b>{{ formItem.dob | dateFormat }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("business_name") }}:
                    <b>{{ formItem.business_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("email") }}:
                    <b>{{ formItem.email }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("phone") }}:
                    <b>{{ formItem.phone | phoneFormat }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("alt_phone") }}:
                    <b>{{ formItem.alt_phone | phoneFormat }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("address") }}:
                    <span>{{ formItem.address }}</span>
                  </b-col>
                </b-row>

                <b-row class="mt-5">
                  <b-col cols="6" md="3" xl="3">
                    <!--photo-->
                    <label for="">{{ $t("photo") }}</label>
                    <div v-if="$helpers.nullToVoid(formItem.photo) == ''">
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/photo/${formItem.photo}`"
                        alt="photo"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.photo"
                      />

                      <b-tooltip
                        :target="formItem.photo"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/photo/${formItem.photo}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--national_id-->
                    <label for="">{{ $t("national_id") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(formItem.national_id_photo) == ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/national_id_photo/${formItem.national_id_photo}`"
                        alt="national"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.national_id_photo"
                      />

                      <b-tooltip
                        :target="formItem.national_id_photo"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/national_id_photo/${formItem.national_id_photo}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--mortgage-->
                    <label for="">{{ $t("mortgage") }}</label>
                    <div v-if="$helpers.nullToVoid(formItem.mortgage) == ''">
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/mortgage/${formItem.mortgage}`"
                        alt="mortgage"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.mortgage"
                      />

                      <b-tooltip
                        :target="formItem.mortgage"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/mortgage/${formItem.mortgage}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3" class="mt-3">
                    <!--salary_invoice-->
                    <label for="">{{ $t("salary_invoice") }}</label>
                    <div
                      v-if="$helpers.nullToVoid(formItem.salary_invoice) == ''"
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/salary_invoice/${formItem.salary_invoice}`"
                        alt="salary_invoice"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.salary_invoice"
                      />

                      <b-tooltip
                        :target="formItem.salary_invoice"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/salary_invoice/${formItem.salary_invoice}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>
                </b-row>
              </b-tab>
              <b-tab :title="$t('borrower')">
                <b-row>
                  <b-col cols="6">
                    {{ $t("first_name") }}:
                    <b>{{ formItem.borrower_first_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("gender") }}:
                    <b v-if="formItem.borrower_gender == 1">{{ $t("male") }}</b>
                    <b v-if="formItem.borrower_gender == 2">{{
                      $t("female")
                    }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("last_name") }}:
                    <b>{{ formItem.borrower_last_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("dob") }}:
                    <b>{{ formItem.borrower_dob | dateFormat }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("business_name") }}:
                    <b>{{ formItem.borrower_business_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("email") }}:
                    <b>{{ formItem.borrower_email }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("phone") }}:
                    <b>{{ formItem.borrower_phone | phoneFormat }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("alt_phone") }}:
                    <b>{{ formItem.borrower_alt_phone | phoneFormat }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("address") }}:
                    <span>{{ formItem.borrower_address }}</span>
                  </b-col>
                </b-row>

                <b-row class="mt-5">
                  <b-col cols="6" md="3" xl="3">
                    <!--photo-->
                    <label for="">{{ $t("photo") }}</label>
                    <div
                      v-if="$helpers.nullToVoid(formItem.borrower_photo) == ''"
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/borrower/photo/${formItem.borrower_photo}`"
                        alt="photo"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.borrower_photo"
                      />

                      <b-tooltip
                        :target="formItem.borrower_photo"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/borrower/photo/${formItem.borrower_photo}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--national_id-->
                    <label for="">{{ $t("national_id") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(formItem.borrower_national_photo) ==
                        ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/borrower/national_id_photo/${formItem.borrower_national_photo}`"
                        alt="national"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.borrower_national_photo"
                      />

                      <b-tooltip
                        :target="formItem.borrower_national_photo"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/borrower/national_id_photo/${formItem.borrower_national_photo}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--family_book-->
                    <label for="">{{ $t("family_book") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(formItem.borrower_family_book) == ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/borrower/family_book/${formItem.borrower_family_book}`"
                        alt="family_book"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.borrower_family_book"
                      />

                      <b-tooltip
                        :target="formItem.borrower_family_book"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/borrower/family_book/${formItem.borrower_family_book}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--mortgage-->
                    <label for="">{{ $t("mortgage") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(formItem.borrower_mortgage) == ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/borrower/mortgage/${formItem.borrower_mortgage}`"
                        alt="mortgage"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.borrower_mortgage"
                      />

                      <b-tooltip
                        :target="formItem.borrower_mortgage"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/borrower/mortgage/${formItem.borrower_mortgage}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3" class="mt-3">
                    <!--salary_invoice-->
                    <label for="">{{ $t("salary_invoice") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(formItem.borrower_salary_invoice) ==
                        ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/borrower/salary_invoice/${formItem.borrower_salary_invoice}`"
                        alt="salary_invoice"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.borrower_salary_invoice"
                      />

                      <b-tooltip
                        :target="formItem.borrower_salary_invoice"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/borrower/salary_invoice/${formItem.borrower_salary_invoice}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>
                </b-row>
              </b-tab>
            </b-tabs>
          </b-card>
        </b-col>
      </b-row>
    </div>
    <template slot="modal-footer">
      <b-button variant="outline-danger" @click="clearForm" class="float-right">
        <i class="fas fa-times-circle mr-1"></i>
        {{ $t("close") }}
      </b-button>
    </template>
  </b-modal>
</template>
<script>
export default {
  props: {
    modalType: {
      type: Number,
      default: () => {
        return 0;
      },
    },
    formItem: {
      type: Object,
      default: () => {
        return {};
      },
    },
  },
  data() {
    return {
      modalShow: false,
    };
  },
  watch: {
    modalType: {
      handler(val) {
        if (val == 1) {
          this.modalShow = true;
        } else {
          this.modalShow = false;
        }
      },
      immediate: true,
    },
  },
  methods: {
    clearForm() {
      this.$emit("closeModal");

      this.modalShow = false;
    },
  },
};
</script>
<style scoped>
/deep/ .custom-modal {
  border-radius: 15px;
}
</style>
