using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace sistemaModeradorZigZag
{
    public partial class frmPainelCostureiro : Form
    {
        public frmPainelCostureiro()
        {
            InitializeComponent();
            consultarBD consulta = new consultarBD();

            lblNumVerificados.Text = consulta.GetNumeroUsuarios("costureiro", "1");
            lblNumNaoVerificados.Text = consulta.GetNumeroUsuarios("costureiro", "0");

            atualizarDataGridView();
        }

        public void atualizarDataGridView() 
        {
            consultarBD consulta = new consultarBD();
            dataGridView1.DataSource = null;
            dataGridView1.Rows.Clear();
            dataGridView1.Columns.Clear();
            dataGridView1.Refresh();
            dataGridView1.DataSource = consulta.GetTodosDados("costureiro");
            dataGridView1.DataMember = "dados";
        }
        
    }
}
