interface Seller {
    id: number;
    name: string;
    email: string;
    actions: ?{
        edit: string;
        delete: string;
        comission: string;
    }
}
