<template>
    <div>
        <b-card>
            <b-card-header
                class="card-header-content"
                header-bg-variant="transparent"
                style="border-bottom: 0px"
            >
                <b-row>
                    <b-col>
                        <div class="page-title">
                            <b-icon icon="person-square"></b-icon>
                            {{ $t('request_loan') }}
                        </div>
                    </b-col>
                </b-row>
            </b-card-header>

            <b-card-body class="px-0">
                <b-col sm="12" md="12" xl="12">
                    <b-card>
                        <b-card-header>
                            <b-col cols="12" >
                                <p style="font-size: x-large;" align="center">{{ $t('request_loan') }}</p>
                            </b-col>
                        </b-card-header>

                        <b-card-body>
                            <b-col cols="12">
                                <form-wizard
                                    color="#20a0ff"
                                    error-color="#ff4949"
                                    :reset="setIndex"
                                    shape="circle"
                                    ref="loan_form"

                                >
                                    <tab-content :title="$t('borrower')" icon="people">

                                    </tab-content>

                                    <tab-content :title="$t('guarantor')" icon="people">

                                    </tab-content>

                                    <tab-content :title="$t('loan')" icon="people">

                                    </tab-content>

                                </form-wizard>
                            </b-col>
                        </b-card-body>

                    </b-card>
                </b-col>
            </b-card-body>
        </b-card>
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
            form: {},
            setIndex: false
        }
    }
}
</script>
<style scoped>
.card{
    border-radius: 1.25rem;
}
</style>
