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
              <b-tab :title="$t('borrower')" active>
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

                <b-row class="mt-4">
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
              <b-tab :title="$t('guarantor')">
                <b-row>
                  <b-col cols="6">
                    {{ $t("first_name") }}:
                    <b>{{ formItem.guarantor_first_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("gender") }}:
                    <b v-if="formItem.guarantor_gender == 1">{{
                      $t("male")
                    }}</b>
                    <b v-if="formItem.guarantor_gender == 2">{{
                      $t("female")
                    }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("last_name") }}:
                    <b>{{ formItem.guarantor_last_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("dob") }}:
                    <b>{{ formItem.guarantor_dob | dateFormat }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("business_name") }}:
                    <b>{{ formItem.guarantor_business_name }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("email") }}:
                    <b>{{ formItem.guarantor_email }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("phone") }}:
                    <b>{{ formItem.guarantor_phone | phoneFormat }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("alt_phone") }}:
                    <b>{{ formItem.guarantor_alt_phone | phoneFormat }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("address") }}:
                    <span>{{ formItem.guarantor_address }}</span>
                  </b-col>
                </b-row>

                <b-row class="mt-4">
                  <b-col cols="6" md="3" xl="3">
                    <!--photo-->
                    <label for="">{{ $t("photo") }}</label>
                    <div
                      v-if="$helpers.nullToVoid(formItem.guarantor_photo) == ''"
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/photo/${formItem.guarantor_photo}`"
                        alt="photo"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.guarantor_photo"
                      />

                      <b-tooltip
                        :target="formItem.guarantor_photo"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/photo/${formItem.guarantor_photo}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--national_id-->
                    <label for="">{{ $t("national_id") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(
                          formItem.guarantor_national_photo
                        ) == ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/national_id_photo/${formItem.guarantor_national_photo}`"
                        alt="national"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.guarantor_national_photo"
                      />

                      <b-tooltip
                        :target="formItem.guarantor_national_photo"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/national_id_photo/${formItem.guarantor_national_photo}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--mortgage-->
                    <label for="">{{ $t("mortgage") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(formItem.guarantor_mortgage) == ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/mortgage/${formItem.guarantor_mortgage}`"
                        alt="mortgage"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.guarantor_mortgage"
                      />

                      <b-tooltip
                        :target="formItem.guarantor_mortgage"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/mortgage/${formItem.guarantor_mortgage}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>

                  <b-col cols="6" md="3" xl="3">
                    <!--salary_invoice-->
                    <label for="">{{ $t("salary_invoice") }}</label>
                    <div
                      v-if="
                        $helpers.nullToVoid(
                          formItem.guarantor_salary_invoice
                        ) == ''
                      "
                    >
                      <i
                        class="fas fa-image"
                        style="font-size: 150px; color: #a0aec0"
                      ></i>
                    </div>
                    <div v-else>
                      <b-img
                        :src="`/images/guarantor/salary_invoice/${formItem.guarantor_salary_invoice}`"
                        alt="salary_invoice"
                        width="150"
                        height="150"
                        rounded
                        :id="formItem.guarantor_salary_invoice"
                      />

                      <b-tooltip
                        :target="formItem.guarantor_salary_invoice"
                        placement="right"
                        variant="light"
                      >
                        <img
                          width="420"
                          height="420"
                          :src="`/images/guarantor/salary_invoice/${formItem.guarantor_salary_invoice}`"
                        />
                      </b-tooltip>
                    </div>
                  </b-col>
                </b-row>
              </b-tab>
              <b-tab :title="$t('loan')">
                <b-row>
                  <b-col cols="6">
                    {{ $t("request_date") }}:
                    <b>{{ formItem.request_date | dateTimeFormat }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("request_amount") }}:
                    <b>$ {{ formItem.request_amount }}</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("term") }}:
                    <b>{{ formItem.term }} {{ $t("month") }}</b>
                  </b-col>
                  <b-col cols="6">
                    {{ $t("interest") }}:
                    <b>{{ formItem.interest }} %</b>
                  </b-col>
                </b-row>
                <hr />
                <b-row>
                  <b-col cols="6">
                    {{ $t("outstanding_amount") }}:
                    <b>$ {{ formItem.outstanding_amount }}</b>
                  </b-col>
                </b-row>
              </b-tab>
            </b-tabs>
          </b-card>
        </b-col>
      </b-row>
    </div>
    <template slot="modal-footer">
      <span v-if="formItem.status == 'Approved'"
        >{{ $t("appointment_date") }}:
        {{ formItem.appointment_date | dateTimeFormat }}</span
      >
      <div v-if="formItem.status == 'Pending'">
        <b-button
          variant="outline-success"
          @click="opendAppoinmentModal"
          class="float-right"
        >
          <i class="fas fa-check-circle mr-1"></i>
          {{ $t("approve") }}
        </b-button>

        <b-button
          variant="outline-danger"
          @click="reject"
          class="float-right mr-2"
        >
          <i class="fas fa-times-circle mr-1"></i>
          {{ $t("reject") }}
        </b-button>

        <b-button
          variant="outline-primary"
          @click="clearForm"
          class="float-right mr-2"
        >
          <i class="fas fa-door-closed mr-1"></i>
          {{ $t("close") }}
        </b-button>
      </div>
      <div v-else>
        <b-button
          variant="outline-danger"
          @click="clearForm"
          class="float-right"
        >
          <i class="fas fa-times-circle mr-1"></i>
          {{ $t("close") }}
        </b-button>
      </div>
    </template>

    <div v-if="modalAppoinmentShow">
      <b-modal
        v-model="modalAppoinmentShow"
        centered
        no-close-on-backdrop
        no-close-on-esc
        hide-header-close
        hide-header
        size="md"
        content-class="custom-modal"
      >
        <b-row>
          <b-col cols="6">
            <b-form-group
              :invalid-feedback="veeErrors.first('date')"
              :label="$t('appointment_date') + ' *'"
              label-class="control-label"
              class="text-left"
            >
              <b-form-input
                autocomplete="off"
                v-model="appoint_date"
                v-validate="'required'"
                :state="veeErrors.has('date') ? false : null"
                data-vv-name="date"
                :data-vv-as="$t('date')"
                type="date"
              ></b-form-input>
            </b-form-group>
          </b-col>
          <b-col cols="6">
            <b-form-group
              :invalid-feedback="veeErrors.first('time')"
              :label="$t('time') + ' *'"
              label-class="control-label"
              class="text-left"
            >
              <b-form-input
                autocomplete="off"
                v-model="appoint_time"
                v-validate="'required'"
                :state="veeErrors.has('time') ? false : null"
                data-vv-name="time"
                :data-vv-as="$t('time')"
                type="time"
              ></b-form-input>
            </b-form-group>
          </b-col>
        </b-row>
        <template slot="modal-footer">
          <b-button
            variant="outline-danger"
            @click="closeAppoinmentModal"
            class="float-right"
          >
            <i class="fas fa-door-closed mr-1"></i>
            {{ $t("close") }}
          </b-button>

          <b-button
            variant="outline-primary"
            @click="approve"
            class="float-right"
          >
            <i class="fas fa-bookmark mr-1"></i>
            {{ $t("ok") }}
          </b-button>
        </template>
      </b-modal>
    </div>
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
      modalAppoinmentShow: false,
      appoint_date: null,
      appoint_time: null,
      closeType: "close",
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
    opendAppoinmentModal() {
      this.modalAppoinmentShow = true;
    },
    closeAppoinmentModal() {
      this.modalAppoinmentShow = false;
    },
    approve() {
      let vm = this;

      this.$validator.validateAll().then((result) => {
        if (result) {
          swal
            .fire({
              title: vm.$t("are_you_sure"),
              text: vm.$t("cannot_revert_this"),
              icon: "question",
              showCancelButton: true,
              confirmButtonText: vm.$t("ok"),
              cancelButtonText: vm.$t("cancel"),
              reverseButtons: true,
              allowOutsideClick: () => !swal.isLoading(),
            })
            .then((result) => {
              let input = {
                loan_id: vm.formItem.id,
                appointment_date: `${this.appoint_date} ${this.appoint_time}`,
                borrower_id: vm.formItem.borrower_id,
              };

              if (result.isDismissed == false) {
                axios
                  .post("/loan/approve_request", input)
                  .then(function (response) {
                    if (response.status == 200) {
                      vm.closeType = "approve";
                      vm.clearForm();

                      vm.$notify({
                        group: "message",
                        type: "success",
                        title: vm.$t("approve"),
                        text: vm.$t("done_action"),
                      });
                    }
                  });
              }
            });
        } else {
          swal.fire({
            icon: "warning",
            title: this.$t("appointment_date"),
            text: this.$t("validation_failed"),
          });
        }
      });
    },
    reject() {
      let vm = this;

      swal
        .fire({
          title: vm.$t("are_you_sure"),
          text: vm.$t("cannot_revert_this"),
          icon: "question",
          showCancelButton: true,
          confirmButtonText: vm.$t("ok"),
          cancelButtonText: vm.$t("cancel"),
          reverseButtons: true,
          allowOutsideClick: () => !swal.isLoading(),
        })
        .then((result) => {
          let input = {
            loan_id: vm.formItem.id,
            borrower_id: vm.formItem.borrower_id,
          };

          if (result.isDismissed == false) {
            axios.post("/loan/reject_request", input).then(function (response) {
              if (response.status == 200) {
                vm.closeType = "reject";
                vm.clearForm();

                vm.$notify({
                  group: "message",
                  type: "success",
                  title: vm.$t("reject"),
                  text: vm.$t("done_action"),
                });
              }
            });
          }
        });
    },
    clearForm() {
      this.$emit("closeModal", this.closeType);

      this.appoint_date = null;
      this.appoint_time = null;

      this.modalShow = false;
      this.modalAppoinmentShow = false;
      this.closeType = "close";
    },
  },
};
</script>
<style scoped>
/deep/ .custom-modal {
  border-radius: 15px;
}
</style>
